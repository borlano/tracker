var current_page = 1;
var total_count = 0;
var records_per_page = 0;
var sort = "asc";
var field = 'id';
$(document).ready(function () {
    load_data(current_page,field,sort);
});

function load_data(page,field,sort) {
    $.ajax({
        url: "/tasks/getAllTasks",
        method: "POST",
        data: {page: page,field:field,sort:sort},
        dataType: 'json',
        success: function (data) {
            total_count = data.count;
            records_per_page = data.limit;
            $("#tasks tbody").html('');
            $("#tasks tbody").append(data.tasks);
        }
    })
};

$("#btn_prev").on("click", function () {
    if (current_page > 1) {
        current_page--;
        load_data(current_page,field,sort);
    }

});
$("#btn_next").on("click", function () {
    if (current_page < numPages()) {
        current_page++;
        load_data(current_page,field,sort);
    }
});

$("#tasks thead th").on("click", function(){
    if(typeof $(this).attr("id") == "undefined"){
        return;
    }
    field = $(this).attr("id");
    if(sort === "asc"){
        sort = "desc";
    }else{
        sort = "asc";
    }
    load_data(current_page,field,sort);
});

function numPages() {
    return Math.ceil(total_count / records_per_page);
}
