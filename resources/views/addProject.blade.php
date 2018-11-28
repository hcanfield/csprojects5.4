<!-- This is for when the user wants to create a new project -->
@extends('template')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Add New Project
        </div>

        <form action="{{ url('/project') }}" method="POST" id="addProject">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="POST">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="name">Project Name:</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>

                <div class="form-group col-md-4">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="Available">Available</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                        <option value="Not Published">Not Published</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="description">Description:</label>
                    <textarea type="textarea" class="form-control" id="description" name="description" rows="5" cols="30">Add a description of the project.</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="skills">Skills Needed:</label>
                    <textarea type="textarea" class="form-control" id="skills" name="skills" rows="5" cols="30">Add skills needed for the project.</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="people_needed">People Needed:</label>
                    <input type="number" class="form-control" min="1" step="1" id="people_needed" name="people_needed">
                </div>
                <div class="form-group col-md-6">
                    <label for="category">Category:</label>
                    <select class="form-control" name="category">
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile App Development">Mobile App Development</option>
                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                        <option value="Network Security">Network Security</option>
                        <option value="Cryptography">Cryptography</option>
                        <option value="Virtual Reality">Virtual Reality</option>
                        <option value="Machine Learning">Machine Learning</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" form="addProject" value="Submit">Add Project</button>
        </form>
    </div>
@endsection