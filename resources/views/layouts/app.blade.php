<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WorkWise') }}</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <main>
        <div id="wrapper">
            @include('layouts._header')

            @include('layouts._sidenav')

            <div id="page-wrapper">
                @include('layouts._flash')

                @yield('content')
            </div>
        </div>
    </main>

    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>

    <script>
        window.addEventListener("DOMContentLoaded", (event) => {
        var cardTag = document.querySelectorAll(".job-card__tags li");
        var filterTagClose = document.querySelectorAll("#filter-tags-list li span");

        for (var i = 0; i < cardTag.length; i++) {
            cardTag[i].addEventListener("click", tagClicked(i));
        }

        for (var i = 0; i < filterTagClose.length; i++) {
            filterTagClose[i].addEventListener("click", closeClicked(i));
        }

        refreshList();

        //When a card tag is clicked
        function tagClicked(i) {
            //Get tag value
            var cardText = cardTag[i].innerHTML;

            //Create filter tag
            var newTag = document.createElement("li");
            newTag.innerHTML =
            "<p>" + cardText + '</p><span class="close-span">×</span>';

            return function () {
            //check if tag already exits
            var toAdd = true;
            var filterListing = document.querySelectorAll("#filter-tags-list li p");
            for (var keyValue = 0; keyValue < filterListing.length; keyValue++) {
                if (cardText == filterListing[keyValue].innerHTML) {
                toAdd = false;
                }
            }

            //Append filter tag to the list
            if (toAdd) {
                document.getElementById("filter-tags-list").appendChild(newTag);
            }
            refreshList();
            };
        }

        //When filter tag close is clicked
        function closeClicked(i) {
            return function () {
            filterTagClose[i].parentNode.remove();
            refreshList();
            };
        }

        //Clear all filter tags
        document
            .getElementById("js-clear-tags")
            .addEventListener("click", function () {
            document.getElementById("filter-tags-list").innerHTML = "";
            refreshList();
            });

        //Function to reload list of jobs
        function refreshList() {
            //Refresh the filter list
            filterTagClose = document.querySelectorAll("#filter-tags-list li span");
            var fiterC = document.getElementById("filter-tags-list").parentNode;

            for (var i = 0; i < filterTagClose.length; i++) {
            filterTagClose[i].addEventListener("click", closeClicked(i));
            }

            //List Sorting
            var jobListing = document.querySelectorAll("#job-list>li");
            var filterListing = document.querySelectorAll("#filter-tags-list li p");
            var matches = 0;

            for (var job = 0; job < jobListing.length; job++) {
            var skillSet = jobListing[job].querySelectorAll(".job-card__tags li");
            matches = 0;

            for (var keyValue = 0; keyValue < filterListing.length; keyValue++) {
                for (var skill = 0; skill < skillSet.length; skill++) {
                if (skillSet[skill].innerHTML == filterListing[keyValue].innerHTML) {
                    matches += 1;
                }
                }
            }
            if (matches == filterListing.length) {
                jobListing[job].classList.remove("d-none");
            } else {
                jobListing[job].classList.add("d-none");
            }
            }

            //Check if tags are present
            if (document.querySelectorAll("#filter-tags-list li").length) {
            fiterC.classList.remove("d-none");
            } else {
            fiterC.classList.add("d-none");
            for (var i = 0; i < jobListing.length; i++) {
                jobListing[i].classList.remove("d-none");
            }
            }
        }
        });
    </script>

    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>