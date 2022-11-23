
@extends('students.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Management</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('students.create')  }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Student
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Semister</th>
                                        <th>Section</th>
                                        <th>GroupMember</th>
                                        <th>Assignment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $student->studname }}</td>
                                        <td>{{ $student->course }}</td>
                                        <td>{{ $student->semister }}</td>
                                        <td>{{ $student->section }}</td>
                                        <td>{{ $student->groupmember }}</td>
                                        <td>{{ $student->assignment }}</td>
                                        <td>
                                            <a href="{{ route('students.show', $student->id) }}"title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('students.edit', $student->id) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ route('students.destroy', $student->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Are you sure you want to delete  ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection