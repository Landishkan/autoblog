<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Заголовок статьи')
                    ->required(),
                Select::make('category')
                    ->label('Категория')
                    ->options([
                        'Советы' => 'Советы',
                        'Трейд-ин' => 'Трейд-ин',
                        'Аукционы' => 'Аукционы',
                    ]),
                FileUpload::make('image')
                    ->label('Обложка')
                    ->image()
                    ->directory('blog-images'),
                RichEditor::make('content')
                    ->label('Содержание')
                    ->columnSpanFull(),
            ]);
    }
}