@extends('layouts.admin')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Mountain List Able
            </h6>
        </div>
        <div class="card-body">
            <a href="/mountainables/create"><button type="button" class="btn btn-primary mb-3">Creat New List</button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Moutain Name - Address </th>
                            <th>Maximum Climbers</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mountainAbles as $mountainAble)
                            @php
                                $mountain = DB::table('mountains')
                                    ->where('id', $mountainAble->mountain_id)
                                    ->first();
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mountain->nm_mountain }} - {{ $mountain->address_mountain }}</td>
                                <td>{{ $mountainAble->max_people }}</td>
                                <td>{{ $mountainAble->date_able }}</td>
                                <td>{{ $mountainAble->price }}</td>
                                <td>
                                    <a href="/mountainables/{{ $mountainAble->id }}/edit" class="badge bg-warning"><span
                                            class="fa-solid fa-pen-to-square"></span></a>
                                    <form action="{{ route('mountainables.destroy', $mountainAble->id) }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
