class Content {
    static fieldId = 1;
    static wrapper = ".content-items";
    static item = "content-item";
    static contentInput = "content-input";
    static templay;
    static rows = [];

    static init(contentJson) {
        Content.getTemplay();
        Content.getRows(["sub_title", "text", "img", "video", "break"]);
        Content.addRow();

        if (typeof contentJson === "string") {
            contentJson = JSON.parse(contentJson);
            contentJson.forEach(function (row) {
                Content.addRow(row["type"], row["value"], null, row["level"]);
            });
        }
    }

    static getTemplay() {
        Content.templay = $("#content-templay")
            .children(".content-item")
            .clone(true, true);
        $("#content-templay").remove();
    }

    static getRows(rowsArray) {
        rowsArray.forEach(function (row) {
            Content.rows[row] = $("#" + row)
                .children(".mb-3")
                .clone(true, true);
            $("#" + row).remove();
        });
    }

    static addRow(rowName = null, content = null, currentRow = null, level) {
        let temp = $(Content.templay).clone(true, true);
        if (rowName) {
            let row = $(Content.rows[rowName]).clone(true, true);
            if (content) {
                Content.insertContent(row, content);
            }
            if (level) {
                Content.toggleSubtitle(row, level);
            }
            $(temp).prepend(row);
        } else {
            $(temp).find(".btn-del").remove();
        }

        Content.setAttr(temp);

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

    static setAttr(currentRow) {
        $(currentRow).attr("id", Content.item + "_" + Content.fieldId);

        $(currentRow)
            .find('[id^="content_"]')
            .attr("id", "content_" + Content.fieldId);

        $(currentRow)
            .find('label[for^="content_"]')
            .attr("for", "content_" + Content.fieldId);

        // sub_title_
        $(currentRow)
            .find('label[for^="sub_title_"]')
            .each(function (index, element) {
                $(element).attr(
                    "for",
                    "sub_title_" + $(element).html() + "_" + Content.fieldId
                );
            });
        $(currentRow)
            .find('[id^="sub_title_"]')
            .each(function (index, element) {
                $(element).attr(
                    "id",
                    "sub_title_" + $(element).val() + "_" + Content.fieldId
                );
            });

        $(currentRow)
            .find('[name^="sub_title_"]')
            .each(function (index, element) {
                $(element).attr("name", "sub_title_" + Content.fieldId);
            });

        Content.fieldId++;
    }

    static setNames() {
        let input = "";
        $(Content.wrapper)
            .find("." + Content.contentInput)
            .each(function (index, element) {
                if ($(element).find(".form-type").val() == "img") {
                    input = "[img]";
                } else {
                    input = "[value]";
                }
                $(element)
                    .find(".form-control")
                    .attr("name", "content[" + index + "]" + input);
                $(element)
                    .find(".form-type")
                    .attr("name", "content[" + index + "][type]");
                $(element)
                    .find(".form-level")
                    .attr("name", "content[" + index + "][level]");
            });
    }

    static toggleSubtitle(contentInput, value) {
        $(contentInput).find(".form-level").val(value);
        $(contentInput)
            .find("[value=" + value + "]")
            .attr("checked", true);
    }

    static insertContent(row, content) {
        $(row).children("input.form-control[type=text]").val(content);
        $(row).children("textarea").html(content);
    }
}

$(document).ready(function () {
    Content.init(contentJson);

    $(Content.wrapper).on("click", ".btn-plus", function () {
        Content.addRow(
            $(this).attr("value"),
            null,
            $(this).closest("." + Content.item)
        );
    });

    $(Content.wrapper).on("click", ".btn-sub_title", function () {
        Content.toggleSubtitle(
            $(this).closest("." + Content.contentInput),
            $(this).html()
        );
    });

    $(Content.wrapper).on("click", ".btn-del", function () {
        Content.deleteRow($(this));
    });
});

$(document).ready(function () {
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

    $("#url").click(function () {
        if ($("#url").val() == "") {
            genUrl();
        }
    });

    $("textarea").click(function () {
        auto_grow(this);
    });

    // Заполнение тестовыми значениями
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

function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = element.scrollHeight + "px";
}