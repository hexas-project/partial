@extends('index')

@section('content')
    <div class="container mt-5">
        <h2>Students in Batch: {{ $batch }}</h2>
        @if(auth()->user()->role == 2)
  <div class="mb-3 d-flex gap-2 flex-wrap">
    {{-- Listening --}}
    @php $mine = optional($my['listening'] ?? null)->enabled ?? false; @endphp
    <form action="{{ route('batch.toggleCourse', ['batch' => $batch]) }}" method="POST" class="d-inline">
      @csrf
      <input type="hidden" name="course" value="listening">
      <input type="hidden" name="enabled" value="{{ $mine ? 0 : 1 }}">
      <button class="btn {{ $listeningOn ? 'btn-success' : 'btn-outline-secondary' }}">
        Listening: {{ $listeningOn ? 'ON' : 'OFF' }}
        @if($mine) <small>(you set ON)</small> @endif
      </button>
    </form>

    {{-- Reading --}}
    @php $mine = optional($my['reading'] ?? null)->enabled ?? false; @endphp
    <form action="{{ route('batch.toggleCourse', ['batch' => $batch]) }}" method="POST" class="d-inline">
      @csrf
      <input type="hidden" name="course" value="reading">
      <input type="hidden" name="enabled" value="{{ $mine ? 0 : 1 }}">
      <button class="btn {{ $readingOn ? 'btn-success' : 'btn-outline-secondary' }}">
        Reading: {{ $readingOn ? 'ON' : 'OFF' }}
        @if($mine) <small>(you set ON)</small> @endif
      </button>
    </form>

    {{-- Writing --}}
    @php $mine = optional($my['writing'] ?? null)->enabled ?? false; @endphp
    <form action="{{ route('batch.toggleCourse', ['batch' => $batch]) }}" method="POST" class="d-inline">
      @csrf
      <input type="hidden" name="course" value="writing">
      <input type="hidden" name="enabled" value="{{ $mine ? 0 : 1 }}">
      <button class="btn {{ $writingOn ? 'btn-success' : 'btn-outline-secondary' }}">
        Writing: {{ $writingOn ? 'ON' : 'OFF' }}
        @if($mine) <small>(you set ON)</small> @endif
      </button>
    </form>
  </div>
@endif

        
        @if($students->isEmpty())
            <p>No students assigned to this batch.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Batch</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->batch }}</td>
                            {{-- <td>
                                <!-- You can add actions like viewing details, editing, etc. -->
                                <a href="{{ route('student.details', $student->id) }}" class="btn btn-info btn-sm">View Details</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
