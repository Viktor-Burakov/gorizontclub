class Content {
    static fieldId = 1;
    static wrapper = ".content-rows";
    static item = "content-item";

    static rows = [];

    static getRows(rowsArray) {
        rowsArray.forEach(function (row) {
            Content.rows[row] = $("#" + row)
                .children(".mb-3")
                .clone(true, true);
        });
    }

    static addRow(rowName) {
        let row = $(Content.rows[rowName]).clone(true, true);
        $(Content.wrapper).append(row);
        console.log(Content.rows);
    }
}

$(document).ready(function () {
    $("#enter-data").click(function () {
        genUrl();
        $("#H1").val($("#title").val() + " - H1");
        $("#description").val($("#title").val() + " - description");
        $("#keywords").val($("#title").val() + " - keywords");
        $("#preview_text").val($("#title").val() + " - preview_text");
        $("#preview").val($("#title").val() + " - preview");
        $("#preview_alt").val($("#title").val() + " - preview_alt");
        $("#content").val($("#title").val() + " - content");
    });
    $("#url").click(function () {
        if ($("#url").val() == "") {
            genUrl();
        }
    });

    // add fields
    let fieldId = 1;
    let wrapper = ".content-rows";
    let item = "content-item";

    let rowButton = $("#content-btn").children(".mb-3").clone(true, true);
    let rowText = $("#content-text").children(".mb-3").clone(true, true);
    let rowImg = $("#content-img").children(".mb-3").clone(true, true);
    let rowVideo = $("#content-video").children(".mb-3").clone(true, true);

    let fieldClone = $("#" + item + "_0").clone(true, true);

    Content.getRows([
        "content-btn",
        "content-text",
        "content-img",
        "content-video",
    ]);
    Content.addRow("content-btn");
    Content.addRow("content-text");
    Content.addRow("content-img");
    Content.addRow("content-video");

    $(wrapper).on("click", ".btn-plus", function () {
        let field = $(fieldClone).clone(true, true);

        $(field)
            .find('[id^="content_"]')
            .attr("id", "content_" + fieldId);

        $(field)
            .find('label[for^="content_"]')
            .attr("for", "content_" + fieldId);

        $(field).attr("id", item + "_" + fieldId);

        $(this)
            .closest("." + item)
            .after(rowButton);

        fieldId++;
    });

    $(wrapper).on("click", ".btn-del", function () {
        $(this)
            .closest("." + item)
            .remove();
    });

    // bootstrap validation
    (function () {
        "use strict";
        var forms = document.querySelectorAll(".needs-validation");

        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener(
                "submit",
                function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add("was-validated");
                },
                false
            );
        });
    })();
});

function genUrl() {
    let url = $("#title").val();
    url = translitUrl(url);
    $("#url").val(url);
}

function translitUrl(word) {
    var converter = {
        а: "a",
        б: "b",
        в: "v",
        г: "g",
        д: "d",
        е: "e",
        ё: "e",
        ж: "zh",
        з: "z",
        и: "i",
        й: "y",
        к: "k",
        л: "l",
        м: "m",
        н: "n",
        о: "o",
        п: "p",
        р: "r",
        с: "s",
        т: "t",
        у: "u",
        ф: "f",
        х: "h",
        ц: "c",
        ч: "ch",
        ш: "sh",
        щ: "sch",
        ь: "",
        ы: "y",
        ъ: "",
        э: "e",
        ю: "yu",
        я: "ya",
    };

    word = word.toLowerCase();

    var answer = "";
    for (var i = 0; i < word.length; ++i) {
        if (converter[word[i]] == undefined) {
            answer += word[i];
        } else {
            answer += converter[word[i]];
        }
    }

    answer = answer.replace(/[^-0-9a-z]/g, "-");
    answer = answer.replace(/[-]+/g, "-");
    answer = answer.replace(/^\-|-$/g, "");
    return answer;
}
