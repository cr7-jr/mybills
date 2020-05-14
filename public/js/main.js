

$(document).ready(function() {

    var countItemInBasket = 0;

    for (const [key, value] of Object.entries(localStorage)) {
        if (key.includes("mybills-")) {
            countItemInBasket++;
            $("#table-bill tbody").append(value);
        }
    }
    $(".span-Basket").text(countItemInBasket);
    checkCountInSpanBasket();
    function checkCountInSpanBasket() {
        $(".span-Basket").each(function() {
            if ($(this).text() == "0") {
                $(this).css("display", "none");
            } else {
                $(this).css("display", "block");
            }
        });
    }
    $(".btn-add-basket").on("click", function() {
        let randomNumber = "mybills-" + Math.ceil(Math.random() * 100000000);
        if (!$(this).hasClass("clicked")) {
            var id = $(this).data("course_number");
            var value = $(this).data("value");
            var number = $(this).data("number");
            var course_number = $(this).data("course_number");
            var type = $(this).data("type");
            var tr = `<tr>
           <td><input type="hidden" value="${id}">
           <input class="randomNumber" data-randomnumber=${course_number} type="hidden">
           <input class="form-control " type="text" name="number[]" value="${number}" readonly></td>
           <td><input class="form-control" type="text" name="course_number[]" value="${course_number}" readonly></td>
           <td><input class="form-control" type="text"  value="${value}" readonly></td>
            <td><input class="form-control" type="text" name="type[]"  value="${type}" readonly></td>
           <td><button class="btn btn-outline-danger btn-del-tr-bill" data-id_btn_clicked="${course_number}"><i class="fa fa-trash-o" style="font-size: 20px"></i></button></td>
           <tr>`;
            localStorage.setItem(course_number, tr);
            $("#table-bill tbody").append(tr);
            $(this).addClass("clicked");
            countItemInBasket++;
            $(".span-Basket").text(countItemInBasket);

            //style
            $(this)
                .addClass("btn-secondary text-white")
                .removeClass("btn-outline-secondary");
        } else {
            var oneBtn = $(this);
            $(".btn-del-tr-bill").each(function() {
                if (
                    $(this).data("id_btn_clicked") ==
                    oneBtn.data("course_number")
                ) {
                    $(this).click();
                }
            });

            $(this).removeClass("Clicked");
            $(".span-Basket").text(countItemInBasket);

            //style
            $(this)
                .addClass("btn-outline-secondary")
                .removeClass("btn-secondary text-white");
        }
        checkCountInSpanBasket();
    });

    $("body").on("click", ".btn-del-tr-bill", function() {
        $(this)
            .closest("tr")
            .detach();

        localStorage.removeItem(
            $(this)
                .closest("tr")
                .find(".randomNumber")
                .data("randomnumber")
        );

        $("#" + $(this).data("id_btn_clicked")).removeClass("clicked");

        countItemInBasket--;
        $(".span-Basket").text(countItemInBasket);
        checkCountInSpanBasket();
        //style
        $("#" + $(this).data("id_btn_clicked"))
            .addClass("btn-outline-secondary")
            .removeClass("btn-secondary text-white");
        // check_table_is_checked();
    });
    $(".btn-pay-all").on("click", () => {
        localStorage.clear();
    });
    // function check_table_is_checked() {
    //     if ($("#table-bill tbody").text() === "") {
    //         $(".btn-pay-all")
    //             .addClass("d-none")
    //             .removeClass("d-block");
    //     } else {
    //         $(".btn-pay-all")
    //             .addClass("d-block")
    //             .removeClass("d-none");
    //     }
    // }
    /* $(".btn-add-basket").on("click", function() {
       if (!$(this).hasClass("Clicked"))
       {
          /!* $(this).addClass("Clicked");
           countItemInBasket++;
           $(".span-Basket").text(countItemInBasket);

           //style
           $(this)
               .addClass("btn-secondary text-white")
               .removeClass("btn-outline-secondary");*!/

       } else {
          /!* $(this).removeClass("Clicked");
           $(".span-Basket").text(countItemInBasket);

           //style
           $(this)
               .addClass("btn-outline-secondary")
               .removeClass("btn-secondary text-white");*!/

       }
      /!* checkCountInSpanBasket();*!/
   });*/
});
