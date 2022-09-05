<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="icon" href="{{asset($favicon_logo_path)}}" />

    <title>New Release</title>
  </head>
  <body>

    <!-- Old Version -->
    <section id="oldVersionSection" class="d-none container mt-5 text-center">
        <div class="mt-3 mb-3" id="errorMessage"></div>
        <div class="card">
            <div class="card-body">
                <h4 class="text-center text-info">Your current version is <span>{{env('VERSION')}}</span></h4>
                <p>Please wait for upcoming version</p>
            </div>
        </div>
    </section>


    <!-- For New Version -->
    <section id="newVersionSection" class="d-none container mt-5 text-center">
        <div class="mt-3 mb-3" id="errorMessage"></div>
        <div class="card">
            <div class="card-body">
                <h4 class="text-center text-success">A new version <span id="newVersionNo"></span> has been released.</h4>
                <p>Before upgrading, we highly recomended you to keep a backup of your current script and database.</p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h6 class="text-left p-4">New Change Log</h6>
                <ul class="list-group text-left" id="logUL">
                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3 mb-3">
            <div id="spinner" class="d-none spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <button id="upgrade" type="button" class="mt-5 mb-5 btn btn-primary btn-lg">Upgrade</button>
    </section>



    <!-- Optional JavaScript -->
    <script type="text/javascript" src="{{ asset('public/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">

        // Auto Load Start
        const loadAutoData = () => {
            fetch('http://localhost/cartpro/api/data-read')
            .then(res => res.json())
            .then(data => displayAutoLoadData(data))
        }
        let fetchApiData;

        const displayAutoLoadData = data => {

            let clientVersionNumber = stringToNumberConvert({!! json_encode(env("VERSION"))  !!});
            let demoVersion         = stringToNumberConvert(data.general.version);

            if (demoVersion > clientVersionNumber  ) {
                $('#newVersionSection').removeClass('d-none');
                $('#newVersionNo').text(data.general.version);

                const dataLogs = data.log;
                const logUL = document.getElementById('logUL');

                dataLogs.forEach(element => {
                    console.log(element.text);
                    const logLI = document.createElement('li');
                    logLI.classList.add('list-group-item');
                    logLI.innerText = element.text;
                    logUL.appendChild(logLI);
                });
                fetchApiData = data;
            }else{
                $('#oldVersionSection').removeClass('d-none');
                return;
            }
        }
        loadAutoData();

        const stringToNumberConvert = dataString => {
            let version = dataString;
            const myArray = version.split(".");
            let versionString = "";
            myArray.forEach(element => {
                versionString += element;
            });
            let versionConvertNumber = parseInt(versionString);
            return versionConvertNumber;
        }


        $('#upgrade').on('click', function(e){
            e.preventDefault();
            $('#spinner').removeClass('d-none');
            $('#upgrade').text('Upgrading...');
            $.post({
                url: "{{route('auto-load')}}",
                type: "POST",
                data: {data:fetchApiData},
                error: function(response){
                    console.log(response.responseJSON.error[0]);
                    const html = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p> <strong>Error !!! </strong> ${response.responseJSON.error[0]} </p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`;

                    $('#errorMessage').fadeIn("slow").html(html);
                    $('#spinner').addClass('d-none');
                    $('#upgrade').text('Upgrade');
                },
                success: function (data) {
                    console.log(data);
                    if (data == 'success') {
                        $('#spinner').addClass('d-none');
                        $('#upgrade').text('Upgrade');
                        window.location.href = "{{ route('admin.dashboard')}}";
                    }

                }
            })
        })

        // Auto Load End





    </script>

  </body>
</html>
