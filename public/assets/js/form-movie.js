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
                if (
                    contentBackdrop.hasClass("fade") &&
                    inputMovie.val().trim()
                ) {
                    contentBackdrop.addClass("show").removeClass("fade");
                    console.log(1);
                }
            });
            inputMovie.on("blur", function () {
                if (!inputMovie.val().trim()) {
                    inputMovie.typeahead("val", "");
                    searchToggle.toggleClass("d-none");
                }
            });
            searchToggle.on("click", function () {
                if (!inputMovie.val().trim()) {
                    searchToggle.toggleClass("d-none");
                } else {
                    inputMovie.focus();
                }
                inputMovie.typeahead("val", "");
            });
        }

        const apiKey = "ce3ae4dd9c488f80bfe33e31c7e5ad9a"; // Thay YOUR_API_KEY bằng khóa API của bạn
        const searchCollectionUrl = `https://api.themoviedb.org/3/search/collection?api_key=${apiKey}&query=%QUERY%`;
        const srcImg = "https://image.tmdb.org/t/p/w500";
        var engine = new Bloodhound({
            remote: {
                url: searchCollectionUrl,
                wildcard: "%QUERY%",
                transform: function (response) {
                    // Chuyển đổi dữ liệu trả về thành định dạng phù hợp cho Bloodhound
                    return response.results.map(function (item) {
                        return {
                            name: item.name,
                            id: item.id,
                            posterPath: item.poster_path,
                        };
                    });
                },
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace("query"),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
        });

        inputMovie
            .typeahead(
                {
                    hint: false,
                    classNames: {
                        menu: "tt-menu navbar-search-suggestion suggestion-movie",
                        cursor: "active",
                        suggestion:
                            "suggestion d-flex justify-content-between px-3 py-2 w-100",
                    },
                },
                {
                    name: "listMovies",
                    display: "name",
                    limit: 50,
                    source: engine,
                    templates: {
                        header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Movies</h6>',
                        suggestion: function ({ id, posterPath, name }) {
                            return (
                                '<a href="#" class="movie-hover">' +
                                '<div class="d-flex align-items-center">' +
                                '<img class="poster-path" src="' +
                                srcImg +
                                posterPath +
                                '" alt="' +
                                "Image" +
                                '">' +
                                '<div class="user-info">' +
                                '<h6 class="mb-0">' +
                                name +
                                "</h6>" +
                                '<small class="text-muted">' +
                                "</small>" +
                                "</div>" +
                                "</div>" +
                                "</a>"
                            );
                        },
                        notFound:
                            '<div class="not-found px-3 py-2">' +
                            '<h6 class="suggestions-header text-primary mb-2">Pages</h6>' +
                            '<p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p>' +
                            "</div>",
                    },
                }
            )
            //On typeahead result render.
            .bind("typeahead:render", function () {
                // Show content backdrop,
                $("#layout-navbar").css("z-index", 10);
                if (contentBackdrop.hasClass("fade")) {
                    contentBackdrop.addClass("show").removeClass("fade");
                }
            })
            .bind("typeahead:close", function () {
                // Clear search
                $("#layout-navbar").css("z-index", 1075);
                // inputMovie.typeahead("val", "");
                // Hide search input wrapper
                // Fade content backdrop
                if (contentBackdrop.hasClass("show")) {
                    contentBackdrop.addClass("fade").removeClass("show");
                }
            });

        // On searchInput keyup, Fade content backdrop if search input is blank
        inputMovie.on("keyup", function () {
            if (!inputMovie.val()) {
                contentBackdrop.addClass("fade").removeClass("show");
            }
        });

        // Init PerfectScrollbar in search result
        var psSearch;
        $(".navbar-search-suggestion.suggestion-movie").each(function () {
            psSearch = new PerfectScrollbar($(this)[0], {
                wheelPropagation: false,
                suppressScrollX: true,
            });
        });

        inputMovie.on("keyup", function () {
            psSearch.update();
        });
    });
}
