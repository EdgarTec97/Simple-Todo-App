@props(['todos'])

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>Título</th>
            <th>Categoría</th>
            <th class="text-end">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($todos as $todo)
        <tr>
            <td>
                <a href="{{ route('todos-edit', $todo->id) }}" class="text-decoration-none">
                    {{ $todo->title }}
                </a>
            </td>

            <td class="align-items-center gap-2 text-align: center;">
                {{-- color swatch --}}
                <span class="d-inline-block rounded-circle" style="
                        margin-left: 20px;
                        width: 1rem;
                        height: 1rem;
                        --bg: {{ $todo->category->color }};
                        background-color: var(--bg);"></span>
                {{ $todo->category->title }}
            </td>

            <td class="text-end">
                <form action="{{ route('todos-destroy', $todo->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>