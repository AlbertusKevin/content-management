@extends('partial.main')
@section('content')
    @prepend('style')
        <link rel="stylesheet" href="{{ url('/css/habit_planning.css') }}" />
    @endprepend
@section('habit-module')
    @if ($errors->any())
        <?php Alert::toast($errors->first(), 'error'); ?>
    @endif
    <div class="row mt-3">
        <div class="col-md-12">
            <p>Sub modul untuk menambahkan perencanaan habit yang ingin dilakukan</p>
            <hr>
        </div>
    </div>
    <div class="row">
        {{-- Sub Modul kartu habbit --}}
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Kartu Habit</h5>
                </div>
                <div class="card-body card-habit-planning d-flex flex-column">
                    @if (count($habits) == 0)
                        <p class="p-empty">Belum ada habit yang ditambahkan</p>
                    @else
                        <ul class="list-group">
                            @foreach ($habits as $habit)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        {{ $habit->habit }} <span
                                            class="badge bg-secondary rounded-pill ms-2">{{ $habit->nilai }}</span>
                                    </div>
                                    <div class="action-button">
                                        <form action="{{ route('hc.planning.cardhabit.destroy', $habit->id) }}"
                                            class="d-flex justiy-content-center" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="badge bg-danger rounded-pill ms-3 delete-action">hapus</button>
                                            <button type="button"
                                                class="badge bg-primary rounded-pill ms-1 edit-modal-card"
                                                data-id="{{ $habit->id }}">edit</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="card-footer text-muted d-flex flex-row-reverse">
                    <a href="#" class="card-link ms-3 open-modal" data-bs-toggle="modal"
                        data-bs-target="#create-habit">Tambah</a>
                </div>
            </div>
        </div>
        {{-- Sub Modul Niat Implementasi --}}
        <div class="col-md-7 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Niat Implementasi</h5>
                </div>
                <div class="card-body card-habit-planning d-flex flex-column">
                    @if (count($habitsImplementation) == 0)
                        <p class="p-empty">Belum ada niat implementasi yang ditambahkan</p>
                    @else
                        <ol class="list-group list-group-numbered">
                            @foreach ($habitsImplementation as $impl)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        {!! $impl->kalimat !!}
                                    </div>
                                    <div class="action-button">
                                        <form action="{{ route('hc.planning.implementation.destroy', $impl->id) }}"
                                            method="post" class="d-flex justiy-content-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="badge bg-danger rounded-pill ms-3 delete-action">hapus</button>
                                            <button type="button"
                                                class="badge bg-primary rounded-pill ms-1 edit-modal-impl"
                                                data-id="{{ $impl->id }}">edit</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    @endif
                </div>
                <div class="card-footer text-muted d-flex flex-row-reverse">
                    <a href="#" class="card-link ms-3 open-modal" id="add-habit-impl-button">Tambah</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Sub Modul Habit Reward --}}
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Hadiah Habit</h5>
                </div>
                <div class="card-body card-habit-planning d-flex flex-column">
                    @if (count($habitsReward) == 0)
                        <p class="p-empty">Belum ada rencana hadiah yang didapat setelah melakukan habit</p>
                    @else
                        <ol class="list-group list-group-numbered">
                            @foreach ($habitsReward as $reward)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        {!! $reward->kalimat !!}
                                    </div>
                                    <div class="action-button">
                                        <form action="{{ route('hc.planning.reward.destroy', $reward->id) }}" method="post"
                                            class="d-flex justiy-content-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="badge bg-danger rounded-pill ms-3 delete-action">hapus</button>
                                            <button type="button"
                                                class="badge bg-primary rounded-pill ms-1 edit-modal-reward"
                                                data-id="{{ $reward->id }}">edit</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    @endif
                </div>
                <div class="card-footer text-muted d-flex flex-row-reverse">
                    <a href="#" class="card-link ms-3 open-modal" id="add-habit-reward-button">Tambah</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Sub Modul Chaining Habit --}}
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Rantaian Habit</h5>
                </div>
                <div class="card-body card-habit-planning d-flex flex-column">
                    @if (count($chainingHabits) == 0)
                        <p class="p-empty">Belum ada rencana pelaksanaan rantaian habit</p>
                    @else
                        <ol class="list-group list-group-numbered">
                            @foreach ($chainingHabits as $habit)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        {!! $habit->kalimat !!}
                                    </div>
                                    <div class="action-button">
                                        <form
                                            action="{{ route('hc.planning.chaining.delete', [$habit->habitBefore, $habit->habitAfter]) }}"
                                            method="post" class="d-flex justiy-content-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="badge bg-danger rounded-pill ms-3 delete-action">hapus</button>
                                            <button type="button"
                                                class="badge bg-primary rounded-pill ms-1 edit-habit-chain"
                                                data-habitafter="{{ $habit->habitAfter }}"
                                                data-habitbefore="{{ $habit->habitBefore }}">edit</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    @endif
                </div>
                <div class="card-footer text-muted d-flex flex-row-reverse">
                    <a href="#" class="card-link ms-3 open-modal" id="add-habit-chain-button">Tambah</a>
                </div>
            </div>
        </div>
    </div>

    @include('habitcompanion::habit-planning.habit-card.create')
    @include('habitcompanion::habit-planning.habit-card.edit')

    @include('habitcompanion::habit-planning.habit-implementation.create')
    @include('habitcompanion::habit-planning.habit-implementation.edit')

    @include('habitcompanion::habit-planning.habit-reward.create')
    @include('habitcompanion::habit-planning.habit-reward.edit')

    @include('habitcompanion::habit-planning.habit-chaining.create')
    @include('habitcompanion::habit-planning.habit-chaining.edit')
@endsection
@push('script')
    <script type="text/javascript" src="{{ url('js/habit_planning.js') }}"></script>
@endpush
@endsection
