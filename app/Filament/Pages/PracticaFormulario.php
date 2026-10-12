<?php

namespace App\Filament\Pages;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;

class PracticaFormulario extends Page implements HasSchemas
{
    use InteractsWithSchemas;
    
    protected string $view = 'filament.pages.practica-formulario';
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }
        
    public function form(Schema $schema): Schema
    {
        return $schema
        ->components([
            Section::make('Nombre de las alumnas')
                ->description("Hernández González Karen Nayeli. Méndez Jiménez Paola Melissa.")
                
                ->schema([
                    TextInput::make('nombre')
                        ->label('Nombre del proyecto')
                        ->required(),
                ]),

            Select::make('Temas')
                ->options([
                    'tecnologia' => 'Tecnología',
                    'educacion' => 'Educación',
                    'salud' => 'Salud',
                    'medio ambiente' => 'Medio ambiente',
                    'marketing' => 'Marketing',
                ])
                ->required(),
                
            Radio::make('Prioridad')
                ->options ([
                    'baja' => 'Baja',
                    'media' => 'Media',
                    'alta' => 'Alta',
                ]),
            
            Toggle::make('Activo')
                ->label('Proyecto activo')
                ->default(true),

            DatePicker::make('fecha_entrega ')
                ->label('Fecha de entrega')
            ])
   
            ->statePath('data');
        }
        
        public function guardar(): void
        {
            $datos = $this->form->getState();
        }
}
