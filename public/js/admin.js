class Content {
    static fieldId = 1;
    static wrapper = ".content-items";
    static item = "content-item";

    static templay;
    static rows = [];

    static getTemplay() {
        Content.templay = $("#content-templay")
            .children(".content-item")
            .clone(true, true);
    }

    static getRows(rowsArray) {
        rowsArray.forEach(function (row) {
            Content.rows[row] = $("#" + row)
                .children(".mb-3")
                .clone(true, true);
        });
    }

    static addRow(rowName, currentRow = null) {
        let row = $(Content.rows[rowName]).clone(true, true);
        let temp = $(Content.templay).clone(true, true);

        $(temp).prepend(row);
        Content.setId(temp);

        if (currentRow) {
            currentRow.after(temp);
            $(currentRow).next().show("fast");
        } else {
            $(temp).show();
            $(Content.wrapper).append(temp);
        }
    }

    static deleteRow(currentRow) {
        currentRow.closest("." + Content.item).fadeOut(300, function () {
            $(this).remove();
        });
    }

    static setId(currentRow) {
        console.log(Content.fieldId);
        $(currentRow)
            .find('[id^="content_"]')
            .attr("id", "content_" + Content.fieldId);

        $(currentRow)
            .find('label[for^="content_"]')
            .attr("for", "content_" + Content.fieldId);

        $(currentRow).attr("id", Content.item + "_" + Content.fieldId);

        Content.fieldId++;
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
    let wrapper = ".content-items";
    let item = "content-item";

    let rowButton = $("#content-btn").children(".mb-3").clone(true, true);

    let fieldClone = $("#" + item + "_0").clone(true, true);

    Content.getTemplay();
    Content.getRows(["content-text", "content-img", "content-video"]);
    Content.addRow("content-text");
    Content.addRow("content-img");
    Content.addRow("content-video");

    $(wrapper).on("click", ".btn-plus", function () {
        let row = $(this).attr("value");

        Content.addRow(row, $(this).closest("." + item));

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
        Content.deleteRow($(this));
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
