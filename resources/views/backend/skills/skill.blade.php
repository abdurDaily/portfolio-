@extends('backend.layout')
@section('backend_contains')
    <section>
        <div class="container">
            <form action="{{ route('backend.skill.store') }}" method="post">
                @csrf

                <div class="row">

                    <div class="col-xl-4">
                        <label for="year">Year</label>
                        <input name="year" type="text" id="year" placeholder="year" class="form-control py-3"> <br>
                    </div>

                    <div class="col-xl-4">
                        <label for="institute">Institute Name</label>
                        <input name="institute" type="text" id="institute" placeholder="institute name"
                            class="form-control py-3"> <br>
                    </div>

                    <div class="col-xl-4">
                        <label for="skill_range">Skill Range</label>
                        <input name="skill_range" type="number" id="skill_range" placeholder="skill range"
                            class="form-control py-3"> <br>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-xl-6">
                                <label for="title">Title <b class="text-danger">*</b> </label>
                                <input name="title" required type="text" id="title" placeholder="title"
                                    class="form-control py-3">
                                <br>
                            </div>

                            <div class="col-xl-6">
                                <label for="type">Select any type <b class="text-danger">*</b> </label>
                                <select required name="type" id="type" class="py-3 form-control" required>
                                    <option selected disabled>select type</option>
                                    <option value="education">Education</option>
                                    <option value="Experience">Experience</option>
                                    <option value="Skill">Skill</option>
                                </select>
                            </div>

                        </div>
                    </div>


                    <div class="col-12">
                        <label for="details">Details</label>
                        <textarea class="form-control " placeholder="details..." name="description" id="details" cols="30"
                            rows="10"></textarea>
                        <button class="btn btn-primary w-100 mt-3 py-3">submit</button>
                    </div>



                </div>
                
            </form>
        </div>
    </section>

    @push('backend_js')
        <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
        <script>
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    timer: 2000

                });
            @endif
        </script>
    @endpush
@endsection
