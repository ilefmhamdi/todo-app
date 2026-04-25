@extends('layouts.app')

@section('title', 'Mes Tâches')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Mes Tâches <span class="badge bg-secondary">{{ $tasks->count() }}</span></h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Nouvelle tâche</a>
    </div>

    @forelse ($tasks as $task)
        <div class="card mb-3 {{ $task->completed ? 'border-success' : '' }}">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start gap-3">
                    <div>
                        <h5 class="card-title {{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                            {{ $task->title }}
                        </h5>
                        @if ($task->description)
                            <p class="card-text text-secondary mb-2">{{ $task->description }}</p>
                        @endif
                    </div>
                    <div class="d-flex gap-2 flex-shrink-0">
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary">Modifier</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Supprimer cette tâche ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Aucune tâche.
            <a href="{{ route('tasks.create') }}">Créer votre première tâche</a>
        </p>
    @endforelse
@endsection
