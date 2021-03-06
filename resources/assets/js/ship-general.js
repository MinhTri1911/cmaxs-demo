/**
 * Define ship constant
 */
const $tableContent = $('.table-content');
const $areaPaginate = $('#area-paginate');
const $sortValue = $('#sort-value');
const $totalResult = $('#total-result');
const $valueAfterSearch = $('#value-after-search');
const HTTP_SUCCESS_CODE = 200;

/**
 * Pagination function,
 * Handle paginate and send request to server
 *
 * @return void
 */
$(document).on('click', '.pagination li a', function (event) {
    // Get paginate URL redirect for ajax send
    let url = $('#' + $(this).attr('id')).attr('data-url');

    // Send ajax to server
    $.get(url, function (res) {
        if (res.code === HTTP_SUCCESS_CODE) {
            // Load table data content
            $tableContent.empty();
            $tableContent.append(res.table);

            // Insert paginate content, specified by the parameter
            $areaPaginate.empty();
            $areaPaginate.append(res.paginate);

            // Auto replace url, when page change
            replaceUrlPagination();

            // Update total result
            changeTotalResultByGroup();
        }
    })
});

/**
 * Sort list ship,
 * Handle sort list ship by column
 *
 * @return void
 */
$(document).on('click', '.th-line-one i', function (event) {
    // Get data sort attribute
    let dataSort = $(this).attr('data-sort');
    // Parse the data with JSON.parse(), the data becomes a JS object
    let obj = safeParseJson($sortValue.val());
    // Get URL from #sort-value
    let url = $sortValue.attr('data-url');
    // Parse search value data to JS object
    let searchValue = safeParseJson($valueAfterSearch.val());

    // Set query string to group type and load result, field to sort
    let query = {
        'field': dataSort,
        'load': searchValue.load,
        'company-id': searchValue.companyId
    };

    // Swap order by status, 0: ASC, 1: DESC
    for (var key in obj) {
        if (key === dataSort) {
            obj[key] = (obj[key] === 1) ? 0 : 1;
            query.orderBy = obj[key];
        }
    }

    // Add obj value to sortValue
    $sortValue.val(JSON.stringify(obj));

    // Ajax request to server to sort function
    $.get(url, query, function (res) {
        if (res.code === HTTP_SUCCESS_CODE) {
            // Load table data content
            $tableContent.empty();
            $tableContent.append(res.table);

            // Insert paginate content, specified by the parameter
            $areaPaginate.empty();
            $areaPaginate.append(res.paginate);

            // Reset url for sort action
            $sortValue.attr('data-url', url);

            // Replace paginate url
            replaceUrlPagination();

            // Rest url for load record
            $('#load-result').attr('data-url', url);
        }
    });
});

/**
 * Filter ship,
 * Search list ship by column
 *
 * @return void
 */
$(document).on('click', '#btn-filter', function (event) {
    // Get keywords
    let keywords = $(":input").serializeArray();
    // Parse search value data to JS object
    let searchValue = safeParseJson($valueAfterSearch.val());
    // Get data-url
    let url = $(this).attr('data-url') + '?page=1' + '&company-id=' + searchValue.companyId;
    // Handle keywords
    keywords.forEach(function (element, index) {
        if (element.name !== '_token')
            url += '&' + element.name + '=' + element.value;
    });

    // Set query string and load result
    let query = {
        'load': searchValue.load,
        'company-id': searchValue.companyId
    };

    // Ajax request to server to filter function
    $.get(url, query, function (res) {
        if (res.code === HTTP_SUCCESS_CODE) {
            // Load table data content
            $tableContent.empty();
            $tableContent.append(res.table);

            // Insert paginate content, specified by the parameter
            $areaPaginate.empty();
            $areaPaginate.append(res.paginate);

            // Reset url for sort action
            $('#sort-value').attr('data-url', url);

            // Update total result
            changeTotalResultByGroup();

            // Auto replace url, when page change
            replaceUrlPagination();

            // Rest url for load record
            $('#load-result').attr('data-url', url);
        }
    });
});

/**
 * Show record per page,
 * Choose total record in select box and change record per page
 *
 * @return void
 */
$(document).on('change', '#load-result', function() {
    // Get data-url
    let url = $(this).attr('data-url');
    // Parse search value data to JS object
    let searchValue = safeParseJson($valueAfterSearch.val());

    // Set query string to group type and load result
    let query = {
        'load': $('#load-result').val(),
        'company-id': searchValue.companyId
    };
    let query1 = {
        'load': $('#load-result').val(),
        'companyId': searchValue.companyId
    };

    // Set value select after click search
    $valueAfterSearch.val(JSON.stringify(query1));

    // Ajax request to server to show record per page function
    $.get(url, query, function (res) {
        if (res.code === HTTP_SUCCESS_CODE) {
            // Load table data content
            $tableContent.empty();
            $tableContent.append(res.table);

            // Insert paginate content, specified by the parameter
            $areaPaginate.empty();
            $areaPaginate.append(res.paginate);

            // Update total result
            changeTotalResultByGroup();

            // Auto replace url, when page change
            replaceUrlPagination();

            // Reset url for sort action
            $('#sort-value').attr('data-url', url);
        }
    });
});

/**
 * Replace url paginate when sort data
 *
 * @returns void
 */
function replaceUrlPagination() {
    // Parse the data with JSON.parse(), the data becomes a JS object
    let obj = safeParseJson($sortValue.val());
    // Get per page and company id from input hidden
    let searchValue = safeParseJson($valueAfterSearch.val());

    // Set query string
    for (var key in obj) {
        if (obj[key] === 1) {
            query = {
                'field': key,
                'orderBy': obj[key]
            };
            break;
        }

        if ($('#sort-value').attr('data-current-sort') == key && obj[key] == 0) {
            query = {
                'field': key,
                'sortBy': 0
            };
            break;
        }
    }

    // Update paginate url
    $('.pagination li').find('a').each(function (index) {
        // Replace url for paginate when sorting
        if ($(this).attr('data-url')) {
            let url = $(this).attr('data-url')
                + '&field='
                + query.field
                + '&orderBy='
                + query.orderBy
                + '&load=' + searchValue.load;

            $(this).attr('data-url', url);
        }
    });
}

/**
 * Change total filter data result
 */
function changeTotalResultByGroup () {
    $totalResult.empty();
    $totalResult.append($('.table-content').attr('data-total'));
}

/**
 * JSON.parse will throw error, so we need safe parse JSON
 *
 * @param str
 * @returns {null|object}
 */
function safeParseJson(str) {
    let result = null;
    try {
        result = JSON.parse(str);
    } catch (e) {
        console.error("Failed to parse JSON", e);
    }
    return result;
}
