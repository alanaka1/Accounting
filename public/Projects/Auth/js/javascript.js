"use strict";

document.addEventListener("DOMContentLoaded", () => {

    /* =========================================================
       GLOBAL
    ========================================================= */

    const root = document.documentElement;
    const themeToggle = document.getElementById("themeToggle");


    /* =========================================================
       DARK / LIGHT MODE
    ========================================================= */

    function setTheme(theme) {

        const validTheme =
            theme === "dark"
                ? "dark"
                : "light";

        const dark =
            validTheme === "dark";


        root.setAttribute(
            "data-bs-theme",
            validTheme
        );


        localStorage.setItem(
            "auth-theme",
            validTheme
        );


        if (themeToggle) {

            themeToggle.innerHTML =
                dark
                    ? '<i class="fa-solid fa-sun"></i>'
                    : '<i class="fa-solid fa-moon"></i>';


            themeToggle.title =
                dark
                    ? "Light Mode"
                    : "Dark Mode";


            themeToggle.setAttribute(
                "aria-label",
                dark
                    ? "Switch to light mode"
                    : "Switch to dark mode"
            );

        }

    }


    /* =========================================================
       LOAD SAVED THEME
    ========================================================= */

    const savedTheme =
        localStorage.getItem(
            "auth-theme"
        );


    setTheme(
        savedTheme === "dark"
            ? "dark"
            : "light"
    );


    /* =========================================================
       THEME BUTTON
    ========================================================= */

    themeToggle?.addEventListener(
        "click",
        () => {

            const currentTheme =
                root.getAttribute(
                    "data-bs-theme"
                ) || "light";


            setTheme(
                currentTheme === "dark"
                    ? "light"
                    : "dark"
            );

        }
    );


    /* =========================================================
       PASSWORD SHOW / HIDE
    ========================================================= */

    const passwordButtons =
        document.querySelectorAll(
            "[data-password-toggle]"
        );


    passwordButtons.forEach(
        (button) => {

            button.addEventListener(
                "click",
                () => {

                    const targetId =
                        button.dataset.passwordToggle;


                    const input =
                        document.getElementById(
                            targetId
                        );


                    if (!input) {
                        return;
                    }


                    const hidden =
                        input.type === "password";


                    input.type =
                        hidden
                            ? "text"
                            : "password";


                    button.innerHTML =
                        hidden
                            ? '<i class="fa-regular fa-eye-slash"></i>'
                            : '<i class="fa-regular fa-eye"></i>';


                    button.title =
                        hidden
                            ? "Hide Password"
                            : "Show Password";


                    button.setAttribute(
                        "aria-label",
                        hidden
                            ? "Hide Password"
                            : "Show Password"
                    );

                }
            );

        }
    );

});