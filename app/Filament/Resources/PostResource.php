<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Columns\ImageColumn;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),
                            
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->maxLength(65535),
                            
                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('posts')
                            ->disk('public')
                            ->preserveFilenames()
                            ->downloadable()
                            ->openable()
                            ->previewable(true)
                            ->maxSize(1024)
                            ->imagePreviewHeight('250')
                            ->loadingIndicatorPosition('left')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadButtonPosition('left')
                            ->uploadProgressIndicatorPosition('left'),
                            
                        Forms\Components\Select::make('type')
                            ->options([
                                'post' => 'Post',
                                'news' => 'News',
                                'page' => 'Page',
                            ])
                            ->required()
                            ->default('post'),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                    
                ImageColumn::make('image')
                    ->disk('public')
                    ->visibility('public')
                    ->square()
                    ->size(100),
                    
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'post' => 'primary',
                        'news' => 'success',
                        'page' => 'warning',
                    }),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'post' => 'Post',
                        'news' => 'News',
                        'page' => 'Page',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }    

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Quản lý nội dung';
    }

    protected static ?string $navigationLabel = 'Bài viết';
}