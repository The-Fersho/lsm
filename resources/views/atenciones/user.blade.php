@php
    /**
    * @var \App\Models\Atencion $row
    */
    $model = $row->atencionable_type;
    $realModel = $model::find($row->atencionable_id);
@endphp

<span @class([
        'inline-block px-2 py-1 rounded-full text-xs font-medium',
        'bg-blue-100 text-blue-800' => $model == 'App\Models\Estudiante',
        'bg-green-100 text-green-800' => $model == 'App\Models\Docente',
])>
{{
    $realModel->nombres . ' ' . $realModel->apellidos
}}
</span>
