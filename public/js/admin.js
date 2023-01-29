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

    static addRow(rowName = null, currentRow = null, content = null) {
        let temp = $(Content.templay).clone(true, true);

        if (rowName) {
            let row = $(Content.rows[rowName]).clone(true, true);
            if (content) {
                Content.insertContent(row, content);
            }
            $(temp).prepend(row);
        } else {
            $(temp).find(".btn-del").remove();
        }

        Content.setId(temp);

        if (currentRow) {
            currentRow.after(temp);
            $(currentRow).next().show("fast");
        } else {
            $(temp).show();
            $(Content.wrapper).append(temp);
        }

        Content.setNames();
    }

    static deleteRow(currentRow) {
        currentRow.closest("." + Content.item).fadeOut(300, function () {
            $(this).remove();
        });
    }

    static setId(currentRow) {
        $(currentRow)
            .find('[id^="content_"]')
            .attr("id", "content_" + Content.fieldId);

        $(currentRow)
            .find('label[for^="content_"]')
            .attr("for", "content_" + Content.fieldId);

        $(currentRow).attr("id", Content.item + "_" + Content.fieldId);

        Content.fieldId++;
    }

    static setNames() {
        $(Content.wrapper)
            .find(".form-control")
            .each(function (index, element) {
                $(element).attr("name", "content[" + index + "][]");
            });
    }

    static insertContent(input, content) {
        $(input).children("textarea").html(content);

        /*       $(input).value(content); */
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

    Content.getTemplay();
    Content.getRows(["content-text", "content-img", "content-video"]);
    Content.addRow();
    Content.addRow("content-text", null, "content 1231231");
    Content.addRow("content-text", null, "vgfgfgf");
    Content.addRow("content-img", null, "vgfgfg9999999999999999f");

    $(Content.wrapper).on("click", ".btn-plus", function () {
        let row = $(this).attr("value");
        let item = $(this).closest("." + Content.item);

        Content.addRow(row, item);
    });

    $(Content.wrapper).on("click", ".btn-del", function () {
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
