@extends('admin.main')
@section('title','Admin | New Release Version')
@section('admin_content')

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

@endsection

@push('scripts')

    <!-- Optional JavaScript -->
    {{-- <script type="text/javascript" src="{{ asset('public/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/popper.js/umd/popper.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

    <script>
        let clientCurrrentVersion = {!! json_encode(env("VERSION"))  !!};
        let clientCurrrentBugNo   = {!! json_encode(env("BUG_NO"))  !!};
    </script>
    <script type="text/javascript" src="{{asset('public/js/admin/version_upgrade/index.js')}}"></script>


    <script type="text/javascript">

        // Auto Load Start
        // const loadAutoData = () => {
        //     let url = 'http://cartproshop.com/demo_old/api/fetch-data-upgrade'; //Demo Link
        //     fetch(url)
        //     .then(res => res.json())
        //     .then(data => displayAutoLoadData(data))
        // }
        // let fetchApiData;

        // const displayAutoLoadData = data => {

        //     let clientVersionNumber = stringToNumberConvert({!! json_encode(env("VERSION"))  !!});
        //     let demoVersion         = stringToNumberConvert(data.general.version);
        //     let minimumRequiredVersion = stringToNumberConvert(data.general.minimum_required_version);
        //     let autoUpgradeEnable    = data.general.auto_upgrade_enable;
        //     let productMode         = data.general.product_mode;


        //     if (clientVersionNumber >= minimumRequiredVersion && autoUpgradeEnable===true && productMode==='DEMO') {
        //         if (demoVersion > clientVersionNumber) {
        //             $('#newVersionSection').removeClass('d-none');
        //             $('#newVersionNo').text(data.general.version);

        //             const dataLogs = data.log;
        //             const logUL = document.getElementById('logUL');

        //             dataLogs.forEach(element => {
        //                 console.log(element.text);
        //                 const logLI = document.createElement('li');
        //                 logLI.classList.add('list-group-item');
        //                 logLI.innerText = element.text;
        //                 logUL.appendChild(logLI);
        //             });
        //             fetchApiData = data;
        //         }else if(demoVersion === clientVersionNumber){
        //             $('#oldVersionSection').removeClass('d-none');
        //             return;
        //         }else{
        //             return;
        //         }
        //     }
        // }

        // const stringToNumberConvert = dataString => {
        //     let version = dataString;
        //     const myArray = version.split(".");
        //     let versionString = "";
        //     myArray.forEach(element => {
        //         versionString += element;
        //     });
        //     let versionConvertNumber = parseInt(versionString);
        //     return versionConvertNumber;
        // }

        // loadAutoData();
        (function ($) {
            "use strict";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#upgrade').on('click', function(e){
                e.preventDefault();
                $('#spinner').removeClass('d-none');
                $('#upgrade').text('Upgrading...');
                $.post({
                    url: "{{route('auto-load')}}",
                    type: "POST",
                    data: {data:fetchVersionUpgradeApiData, general: fetchGeneralApiData},
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
                            localStorage.setItem('version_upgrade_status','done');
                            $('#spinner').addClass('d-none');
                            $('#upgrade').text('Upgrade');
                            window.location.href = "{{ route('admin.dashboard')}}";
                        }

                    }
                })
            })
        })(jQuery);
        // Auto Load End
    </script>

@endpush
