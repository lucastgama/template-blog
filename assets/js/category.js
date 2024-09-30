jQuery(document).ready(function ($) {
    let currentPage = 1;
    let currentCategory = 0;

    $('.category-button').on('click', function () {
        currentCategory = $(this).data('category-id');
        currentPage = 1;
        loadPostsByCategory(currentCategory, currentPage);
    });

    function loadPostsByCategory(categoryId, page) {
        $.ajax({
            url: ajax_data.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_posts_by_category',
                category_id: categoryId,
                paged: page
            },
            beforeSend: function () {
                const loadersHtml = generateLoaders(8);
                $('.container__posts .grid').html(loadersHtml);
            },
            success: function (response) {
                $('.container__posts .grid').html(response.data.posts);
                $('.posts__pagination').html(response.data.pagination);
            }
        });
    }
    $(document).on('click', '.pagination__border li a', function (e) {
        e.preventDefault();
        let page = $(this).data('page');
        console.log(page)
        loadPostsByCategory(currentCategory, page);
    });
});

function createLoaderCard() {
    return `
        <div role="status" class="w-[260px] p-2 border border-gray-200 rounded-[20px] shadow animate-pulse bg-blackGray">
            <div class="flex items-center justify-center h-44 mb-4 bg-gray-300 rounded-[14px] dark:bg-gray-700">
                <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                    <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/>
                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                </svg>
            </div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-28 mb-4"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
            <div class="flex items-center mt-4">
                <div>
                    <div class="w-20 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                </div>
            </div>
            <span class="sr-only">Loading...</span>
        </div>
    `;
}

function generateLoaders(count) {
    let loaders = '';
    for (let i = 0; i < count; i++) {
        loaders += createLoaderCard();
    }
    return loaders;
}