<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
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
                    ->label('Обложка статьи')
                    ->image()
                    ->directory('blog-images')
                    ->disk('public'),
                
                Textarea::make('content')
                    ->label('Текст статьи')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
/* return $schema
            ->components([
                TextInput::make('title')->required()->label('Заголовок'),
                Select::make('category')
                    ->options([
                        'Советы' => 'Советы',
                        'Трейд-ин' => 'Трейд-ин',
                        'Аукционы' => 'Аукционы',
                    ])->label('Категория'),
                FileUpload::make('image')->image()->directory('blog')->label('Обложка'),
                RichEditor::make('content')->required()->label('Контент')->columnSpanFull(),
            ]); */ 