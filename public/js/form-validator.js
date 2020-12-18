class FormValidate {
  constructor(form, options) {
    const defaultOptions = {
      classError: "error",
    };

    this.form = form;
    this.options = Object.assign({}, defaultOptions, options);

    this.form.setAttribute("novalidate", "novalidate");

    this.prepareElements();
    this.bindSubmit();
  }

  getFields() {
    const inputs = [
      ...this.form.querySelectorAll(
        "input:not(:disabled), select:not(:disabled), textarea:not(:disabled)"
      ),
    ];
    const result = [];

    for (const el of inputs) {
      if (el.willValidate) {
        result.push(el);
      }
    }

    return result;
  }

  prepareElements() {
    const elements = this.getFields();

    for (const el of elements) {
      const tag = el.tagName.toLowerCase();
      const type = el.type.toLowerCase();
      let eventName = "input";

      if (type === "checkbox" || type === "radio" || tag === "select") {
        //checkboxa i radio
        eventName = "change";
      }

      el.addEventListener(eventName, (e) => this.testInput(e.target));
    }
  }

  markFieldAsError(field, show) {
    if (show) {
      field.closest(".form-row").classList.add("form-error");
    } else {
      field.closest(".form-row").classList.remove("form-error");
    }
  }

  testInput(input) {
    const valid = input.checkValidity();
    this.markFieldAsError(input, !valid);
    return valid;
  }

  bindSubmit() {
    this.form.addEventListener("submit", (e) => {
      const elements = this.getFields();

      for (const el of elements) {
        this.markFieldAsError(el, !el.checkValidity());
      }

      const errors = this.form.querySelectorAll(".form-error");
      errors.length  && e.preventDefault();
    });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const cfg = {};
  const form = new FormValidate(document.querySelector(".form"), cfg);
});
