document.addEventListener("DOMContentLoaded", function () {
    const deleteTest = document.getElementById("delete-test-id-modal");
    const activateTest = document.getElementById("activate-test-id-modal");

    const deleteInformationBtns = document.querySelectorAll(
        ".delete-information-btn"
    );
    const deleteEducationBtns = document.querySelectorAll(
        ".delete-education-btn"
    );
    const deleteExperienceBtns = document.querySelectorAll(
        ".delete-experience-btn"
    );
    const activateInformationBtns = document.querySelectorAll(
        ".activate-information-btn"
    );

    const deleteInformationForm = document.getElementById(
        "delete-information-form"
    );
    const deleteEducationForm = document.getElementById(
        "delete-education-form"
    );
    const deleteExperienceForm = document.getElementById(
        "delete-experience-form"
    );
    const activateInformationForm = document.getElementById(
        "activate-information-form"
    );

    function addDeleteEventListener(btn, context) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            const dataIdInformation = btn.getAttribute("data-id");
            if (context === "information") {
                deleteInformationForm.setAttribute(
                    "action",
                    `/${context}/${dataIdInformation}`
                );
            } else if (context === "education") {
                deleteEducationForm.setAttribute(
                    "action",
                    `/${context}/${dataIdInformation}`
                );
            } else if (context === "experience") {
                deleteExperienceForm.setAttribute(
                    "action",
                    `/${context}/${dataIdInformation}`
                );
            }
            deleteTest.textContent = `${
                context.charAt(0).toUpperCase() + context.slice(1)
            } ID: ${dataIdInformation}`;
        });
    }

    function addActivateEventListener(btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            const dataIdInformation = btn.getAttribute("data-id");
            activateInformationForm.setAttribute(
                "action",
                `/set-active/${dataIdInformation}/information`
            );
            activateTest.textContent = `Information ID: ${dataIdInformation}`;
        });
    }

    deleteInformationBtns.forEach((btn) =>
        addDeleteEventListener(btn, "information")
    );
    deleteEducationBtns.forEach((btn) =>
        addDeleteEventListener(btn, "education")
    );
    deleteExperienceBtns.forEach((btn) =>
        addDeleteEventListener(btn, "experience")
    );
    activateInformationBtns.forEach(addActivateEventListener);
});
