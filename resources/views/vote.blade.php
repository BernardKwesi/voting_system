<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Senatory Political HTML-5 Template - shared on themelock.com</title>
  <!-- favicon -->
  <link rel="icon" href="{{ asset('assets1/img/favicon.png') }}" sizes="20x20" type="image/png"/>
  <!-- animate -->
  <link rel="stylesheet" href="{{ asset('assets1/css/animate.css') }}"/>
  <!-- bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets1/css/bootstrap.min.css') }}"/>
  <!-- magnific popup -->
  <link rel="stylesheet" href="{{ asset('assets1/css/magnific-popup.css') }}"/>
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ asset('assets1/css/owl.carousel.min.css') }}"/>
  <!-- fontawesome -->
  <link rel="stylesheet" href="{{ asset('assets1/css/font-awesome.min.css') }}"/>
  <!-- iconmoon css -->
  <link rel="stylesheet" href="{{ asset('assets1/css/iconmoon.css') }}">
  <!-- Hover CSS -->
  <link rel="stylesheet" href="{{ asset('assets1/css/hover-min.css') }}"/>
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}"/>
  <!-- responsive Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets1/css/responsive.css') }}"/>

  <style>
    /* .news-single-items-two:hover{
        border: 2px solid red;
    background-color: #f1f1f1;
    } */

    .selected-card {
        border: 2px solid red;
        background-color: rgba(221, 19, 26, 0.5);
    }

    .about-us-section-area.about-bg {
        background-size: contain;
    }
  </style>
</head>

<body>
  <!-- preloader area start -->
  <div class="preloader" id="preloader">
    <div class="preloader-inner">
      <div class="loader">
        <svg
          id="eJPpT6qIRLO1"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          viewBox="0 0 41 52"
          shape-rendering="geometricPrecision"
          text-rendering="geometricPrecision"
        >
          <g id="eJPpT6qIRLO2" transform="matrix(1 0 0 1 -219 -96.817001)">
            <g id="eJPpT6qIRLO3" transform="matrix(1 0 0 1 219.111 139.233001)">
              <path
                id="eJPpT6qIRLO4"
                d="M117.617,183.55L118.923,187.05L122.66,187.209L119.73,189.534L120.73,193.134L117.613,191.067L114.496,193.134L115.496,189.534L112.567,187.209L116.304,187.05Z"
                transform="matrix(1 0 0 1 -112.573997 -183.550003)"
                opacity="0"
                fill="rgb(221,19,26)"
                stroke="none"
                stroke-width="1"
              />
              <path
                id="eJPpT6qIRLO5"
                d="M117.617,183.55L118.923,187.05L122.66,187.209L119.73,189.534L120.73,193.134L117.613,191.067L114.496,193.134L115.496,189.534L112.567,187.209L116.304,187.05Z"
                transform="matrix(1 0 0 1 -97.171997 -183.550003)"
                opacity="0"
                fill="rgb(221,19,26)"
                stroke="none"
                stroke-width="1"
              />
              <path
                id="eJPpT6qIRLO6"
                d="M117.617,183.55L118.923,187.05L122.66,187.209L119.73,189.534L120.73,193.134L117.613,191.067L114.496,193.134L115.496,189.534L112.567,187.209L116.304,187.05Z"
                transform="matrix(1 0 0 1 -81.771004 -183.550003)"
                opacity="0"
                fill="rgb(221,19,26)"
                stroke="none"
                stroke-width="1"
              />
            </g>
            <path
              id="eJPpT6qIRLO7"
              d="M6238.076,2712.141L6238.076,2692.616L6201.827,2692.616L6201.827,2715.847L6208.336,2715.847L6208.336,2699.125L6231.567,2699.125L6231.567,2705.633L6214.843,2705.633L6214.843,2722.356L6201.826,2722.356L6201.826,2728.865L6221.351,2728.865L6221.351,2716.743L6233.472,2728.865L6238.072,2728.865L6238.072,2724.265L6227.532,2713.725L6225.949,2712.144Z"
              transform="matrix(1 0 0 1 -5980.451 -2595.798999)"
              fill="rgb(221,19,26)"
              fill-rule="evenodd"
              stroke="none"
              stroke-width="1"
            />
          </g>
        </svg>
      </div>
    </div>
  </div>
  <!-- preloader area end -->
  <!-- //. search Popup Start-->
  <div class="body-overlay" id="body-overlay"></div>
  <div class="search-popup" id="search-popup">
      <form action="index.html" class="search-form">
          <div class="form-group">
              <input type="text" class="form-control" placeholder="Search.....">
          </div>
          <button class="close-btn border-none"><i class="icon-search-svgrepo-com-1"></i></button>
      </form>
  </div>
  <!-- Search Popup End -->
  <!-- Header-top-start -->

  <!-- Volunteer Section Start -->

  <div class="about-us-section-area about-bg" style="background-image: url('{{ asset('assets/logos/stakers.jpg') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 col-12">
                <div class="about-inner news">
                    <h1 class="title">{{ $election->name }}</h1>
                </div>

            </div>
        </div>
    </div>
</div>


<form id="addElectionForm">
    <div class="issues-around-us-section style-01">
        <div class="container">
            @foreach ($positions as $position_name =>$position)

            @if(count($position) > 0)
            <h1 class="text-center" style="margin-bottom:30px;margin-top:30px;">{{  $position_name }}</h1>
            <div class="row" style="justify-content: space-around;">

                    @foreach ($position as $candidate)

                        <div class="col-lg-4 col-md-6">
                            <div class="news-single-items-two" data-candidate-id="{{ $candidate->id }}" data-position-name="{{ $position_name }}" data-position-id="{{  $candidate->position_id }}">
                                <div class="thumbnail">
                                    <img src="{{ asset($candidate->img_url) }}" alt="">
                                    {{-- <span class="tag">Candidate</span> --}}
                                </div>
                                <div class="content">

                                    <h4 class="title text-center">{{ $candidate->name }}</h4>
                                    <p class="text-center">{{ $candidate->motto }}</p>
                                    <div class="btn-wrapper vote-btn d-flex justify-content-center">
                                        <span  class="boxed-btn btn-sanatory" style="border:none;">
                                            SELECT
                                            <i class="fas fa-vote-yea"></i>
                                        </span>
                                      </div>

                                </div>
                            </div>
                        </div>
                    @endforeach



            </div>
            <hr>
            @endif

            @endforeach

            <div class="btn-wrapper vote-btn d-flex justify-content-center"  style="margin-bottom:40px;">
                <button  id="submitVote" class="boxed-btn btn-sanatory" style="border:none;">
                    Submit Vote
                    <i class="fas fa-paper-plane"></i>
                </button>
              </div>


        </div>
    </div>
</form>
  <!-- Volunteer Section End -->


  <!-- News Section End -->
  <!-- back to top area start -->
  <div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
  </div>
  <!-- back to top area end -->

  <script src="{{ asset('assets1/js/jquery-2.2.4.min.js') }}"></script>
  <!-- bootstrap -->
  <script src="{{ asset('assets1/js/bootstrap.min.js') }}"></script>
  <!-- magnific popup -->
  <script src="{{ asset('assets1/js/jquery.magnific-popup.js') }}"></script>
  <!-- wow -->
  <script src="{{ asset('assets1/js/wow.min.js') }}"></script>
  <!-- owl carousel -->
  <script src="{{ asset('assets1/js/owl.carousel.min.js') }}"></script>
  <!-- waypoint -->
  <script src="{{ asset('assets1/js/waypoints.min.js') }}"></script>
  <!-- Mail Validation -->
  <script src="{{ asset('assets1/js/mail-validation.js') }}"></script>
  <!-- Contact js -->
  <script src="{{ asset('assets1/js/contact.js') }}"></script>
  <!-- counterup -->
  <script src="{{ asset('assets1/js/jquery.counterup.min.js') }}"></script>
  <!-- countdown -->
  <script src="{{ asset('assets1/js/jquery.countdown.min.js') }}"></script>
  <!-- VanillaTilt effect -->
  <script src="{{ asset('assets1/js/tilt.jquery.js') }}"></script>
  <!-- imageloaded -->
  <script src="{{ asset('assets1/js/imagesloaded.pkgd.min.js') }}"></script>
  <!-- isotope -->
  <script src="{{ asset('assets1/js/isotope.pkgd.min.js') }}"></script>
  <!-- main js -->
  <script src="{{ asset('assets1/js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
var APP_URL = "{{ config('app.url') }}";
document.addEventListener('DOMContentLoaded', function() {
    let selectedCandidates = {}; // To track selected candidates per position

    document.querySelectorAll('.news-single-items-two').forEach(function(card) {
        card.addEventListener('click', function() {
            const positionId = card.dataset.positionId; // Get the position ID from the card

            // If a candidate is already selected for this position, remove the selected class
            if (selectedCandidates[positionId]) {
                selectedCandidates[positionId].card.classList.remove('selected-card');
            }

            // Add the selected class to the clicked card
            card.classList.add('selected-card');

            // Store the selected candidate's ID and position ID for this position
            selectedCandidates[positionId] = {
                candidateId: card.dataset.candidateId,
                card: card // Store the card element itself for later use (like deselecting)
            };
        });
    });

    // Submit the vote when the submit button is clicked
    document.getElementById('submitVote').addEventListener('click', function(event) {
        event.preventDefault();

        // Check if at least one candidate is selected
        if (Object.keys(selectedCandidates).length === 0) {
            Swal.fire({
                text: 'Please select at least one candidate.',
                icon: 'warning'
            });
            return;
        }

        // Create FormData and append selected candidates and positions
        const addElectionForm = document.getElementById('addElectionForm');
        const formdata = new FormData(addElectionForm);
        formdata.append("voter_id",'{{ $voter_id }}');
        formdata.append("election_id",'{{ $election->id }}');

        for (let positionId in selectedCandidates) {
            formdata.append(`votes[${positionId}][candidate_id]`, selectedCandidates[positionId].candidateId);
            formdata.append(`votes[${positionId}][position_id]`, positionId);
        }

        Swal.fire({
            title: '',
            text: "Are you sure you want to submit?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD131A',
            confirmButtonText: 'Submit'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    text: "Submitting ...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });

                fetch(`${APP_URL}/api/vote`, {
                    method: "POST",
                    body: formdata,
                })
                .then(res => res.json())
                .then(data => {
                    if (!data.ok) {
                        Swal.fire({
                            text: data.msg,
                            icon: "error"
                        });
                        return;
                    }

                    Swal.fire({
                        title:"Voting Successful",
                        text: "Thank you for your vote!!!",
                        icon: "success",
                        allowEscapeKey: false,
                        allowOutsideClick: false
                    }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to the desired page after clicking "Okay"
                                window.location.href = '{{ url('/') }}'; // Replace with your target URL
                            }
                        });

                    // Deselect all cards after submission
                    for (let positionId in selectedCandidates) {
                        selectedCandidates[positionId].card.classList.remove('selected-card');
                    }
                    selectedCandidates = {}; // Clear the selection

                    $("#addElectionModal").modal('hide');

                })
                .catch(err => {
                    console.log(err);
                    Swal.fire({
                        icon: "error",
                        text: "Oops! An error occurred while adding the record, please contact the admin."
                    });
                });
            }
        });
    });
});





  </script>
</body>

</html>
