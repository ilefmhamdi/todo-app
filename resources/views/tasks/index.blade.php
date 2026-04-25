@extends('layouts.app')

@section('title', 'Mes Tâches')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="color: #FF2D20;">Mes Tâches <span style="background: #FF2D20; color: white; padding: 2px 10px; border-radius: 10px; font-size: 18px;">{{ $tasks->count() }}</span></h1>
        <a href="{{ route('tasks.create') }}" style="background: #FF2D20; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">+ Nouvelle tâche</a>
    </div>

    @forelse ($tasks as $task)
        @if($task->completed)
        <div style="background: white; padding: 20px; margin: 15px 0; border: 2px solid #28a745; border-radius: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 15px;">
                <div>
                    <h3 style="margin: 0 0 10px 0; text-decoration: line-through; color: #666;">{{ $task->title }}</h3>
                    @if ($task->description)
                        <p style="color: #666; margin: 0;">{{ $task->description }}</p>
                    @endif
                </div>
                <div style="display: flex; gap: 10px; flex-shrink: 0;">
                    @can('update', $task)
                        <a href="{{ route('tasks.edit', $task) }}" style="color: #FF2D20; text-decoration: none; font-weight: bold;">Modifier</a>
                    @endcan
                    @can('delete', $task)
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Supprimer cette tâche ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold;">Supprimer</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
        @else
        <div style="background: white; padding: 20px; margin: 15px 0; border: 2px solid #FF2D20; border-radius: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 15px;">
                <div>
                    <h3 style="margin: 0 0 10px 0;">{{ $task->title }}</h3>
                    @if ($task->description)
                        <p style="color: #666; margin: 0;">{{ $task->description }}</p>
                    @endif
                </div>
                <div style="display: flex; gap: 10px; flex-shrink: 0;">
                    @can('update', $task)
                        <a href="{{ route('tasks.edit', $task) }}" style="color: #FF2D20; text-decoration: none; font-weight: bold;">Modifier</a>
                    @endcan
                    @can('delete', $task)
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Supprimer cette tâche ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold;">Supprimer</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
        @endif
    @empty
        <p style="color: #666;">Aucune tâche. <a href="{{ route('tasks.create') }}" style="color: #FF2D20;">Créer votre première tâche</a></p>
    @endforelse

@endsection
