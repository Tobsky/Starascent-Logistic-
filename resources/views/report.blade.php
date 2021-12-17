@extends('layouts.index')

@section('title')
    Report | Star Ascent
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Generate Report</h1>

            <div>
                <div class="card mb-4 py-3 border-bottom-primary">
                    <div class="card-body">
                            <div>
                                <form class="content-justify-center">
                                    
                                    <div class="form-group row">
                                        <div class="col-lg-3 sm-6 py-2 d-flex">
                                            <label for="date_from" class="mx-2 my-1"> <strong>status</strong></label>
                                            <select  name="" id="status" class="form-control">
                                                <option selected value=""> Please select an option</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 sm-6 py-2 d-flex">
                                            <label class="mx-2 my-1" for="birthday"> <strong>From</strong></label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>

                                        <div class="col-lg-3 sm-6 py-2 d-flex">
                                            <label class="mx-2 my-1" for="birthday"> <strong>To</strong></label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                        <div class="col-lg-3 sm-6 py-2">
                                            <button class="btn btn-sm btn-primary m-1 bg-gradient-primary" type="button" id='view_report'> View Report </button>
                                        </div> 
                                    </div>
                                </form>

                            </div>
                    </div>
                </div>
            </div>
            

    </div>
@endsection