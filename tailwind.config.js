import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            textColor: {
                primary: "#394867",
                secondary: "#ffffff",
                tertiary: "#FFD600",
            },
            backgroundColor: {
                white: "#ffffff",
                primary: "#1A274D",
                secondary: "#233154",
                tertiary: "#FFD600",
                navbar: "#F2F7FF",
            },
            boxShadowColor: {
                primary: "#FFD600",
            },
        },
    },

    plugins: [forms],
};
