"use strict";
if (typeof $ !== "undefined") {
    $(function () {
        // ! TODO: Required to load after DOM is ready, did this now with jQuery ready.
        window.Helpers.initSidebarToggle();

        const searchMovie = $("#search-movies"),
            inputMovie = $("#input-movies"),
            searchToggle = $("#close"),
            searchInputWrapper = $(".search-input-wrapper"),
            contentBackdrop = $(".content-backdrop");

        // console.log(searchInputWrapper , inputMovie , searchMovie , searchToggle , contentBackdrop);
        if (inputMovie.length) {
            inputMovie.on("click", function () {
                if (searchToggle.length && !inputMovie.val().trim()) {
                    searchToggle.toggleClass("d-none");
                    inputMovie.focus();
                }
            });
            inputMovie.on("blur", function () {
                if (!inputMovie.val().trim() && searchToggle.hasClass('d-none')) {
                    inputMovie.val("");
                    searchToggle.removeClass("d-none");
                }
            });
            searchToggle.on("click", function () {
                if (!inputMovie.val().trim()) {
                    searchToggle.toggleClass("d-none");
                }else{
                    inputMovie.focus();
                }
                inputMovie.val("");
            });
        }

        
    });
}
