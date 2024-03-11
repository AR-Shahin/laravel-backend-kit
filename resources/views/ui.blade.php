<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="containter mt-5">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <form action="{{ route('ui') }}" method="POST">
                    @csrf
                    @php
                        $counter = 0;
                    @endphp
                    <input type="hidden" id="counter" value="{{ $counter }}">
                    <table class="table table-bordered table-striped" id="">
                        <tr>
                            <td><label for=""><b>Serial</b></label><input type="number" class="form-control" name="multiple_orders[]"></td>
                            <td>
                                <label for=""><b>Question - {{ $counter + 1 }}</b></label>
                                <input type="text" class="form-control" name="multiple_questions[]">
                                <table class="table table-sm table-bordered text-center">
                                    <tr>
                                        <input type="hidden" class="temp_counter" value="{{ $counter }}">
                                        <td><input type="text" class="form-control" name="multiple_options[{{ $counter }}][]"></td>
                                        <td><button class="btn btn-sm btn-success optionRowCreate" >+</button></td>
                                    </tr>
                                </table>
                            </td>
                            <td class="text-center"><button class="btn btn-sm btn-success mt-4" id="addNewRow">+</button></td>
                        </tr>
                    </table>

                    <button class="btn btn-sm btn-success">Submit</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
        let counter = $("#counter").val();
        $("#addNewRow").click(function(e){
            e.preventDefault();
            let temp = ++ counter;
            let html = `<tr>
                    <td><label for=""><b>Serial</b></label><input type="number" class="form-control" name="multiple_orders[]"></td>
                    <td>
                        <label for=""><b>Question - ${temp + 1}</b></label>
                        <input type="text" class="form-control" name="multiple_questions[]">
                        <table class="table table-sm table-bordered text-center">
                            <tr>
                                <input type="hidden" class="temp_counter" value="${temp}">
                                <td><input type="text" class="form-control" name="multiple_options[${temp}][]"></td>
                                <td><button class="btn btn-sm btn-success optionRowCreate" >+</button></td>
                            </tr>
                        </table>
                    </td>
                    <td class="text-center"><button class="btn btn-sm btn-danger mt-4 deleteMainRow">-</button></td>
                </tr>`;

            $(this).closest("table").append(html)
        });

        $("body").on("click",".deleteMainRow",function(e){
            e.preventDefault();
            $(this).closest("tr").remove()
        });

        $("body").on("click",".optionRowCreate",function(e){
            e.preventDefault();
            var tempCounter = $(this).closest("tr").find(".temp_counter").val();
            console.log(tempCounter);
            let html = `<tr>
                    <td><input type="text" class="form-control" name="multiple_options[${tempCounter}][]"></td>
                    <td><button class="btn btn-sm btn-danger optionRowDelete" >-</button></td>
                </tr>`;
            $(this).closest("table").append(html)
        });
        $("body").on("click",".optionRowDelete",function(e){
            e.preventDefault();
            $(this).closest("tr").remove()
        });
    </script>
  </body>
</html>
