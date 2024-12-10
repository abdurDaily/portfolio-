@extends('backend.layout')
@section('backend_contains')
    <section>
        <div class="container">
            <form action="{{ route('backend.skill.store') }}" method="post">
                @csrf

                <div class="row">

                    <div class="col-xl-6">
                        <label for="year">Year</label>
                        <input name="year" type="text" id="year" placeholder="year" class="form-control py-3"> <br>
                    </div>

                    <div class="col-xl-6">
                        <label for="institute">Institute Name</label>
                        <input name="institute" type="text" id="institute" placeholder="institute name" class="form-control py-3"> <br>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-xl-6">
                                <label for="title">Title <b class="text-danger">*</b> </label>
                                <input name="title" required type="text" id="title" placeholder="title" class="form-control py-3">
                                <br>
                            </div>

                            <div class="col-xl-6">
                                <label for="type">Select any type <b class="text-danger">*</b> </label>
                                <select required name="type" id="type" class="py-3 form-control" required>
                                    <option selected disabled>select type</option>
                                    <option value="education">Education</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>


                    <div class="col-12">
                        <label for="details">Details</label>
                        <textarea class="form-control " placeholder="details..." name="description" id="details" cols="30" rows="10"></textarea>
                        <button class="btn btn-primary w-100 mt-3 py-3">submit</button>
                    </div>



                </div>

            </form>
        </div>
    </section>

@endsection
