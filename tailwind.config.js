const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                roboto: ["Roboto Condensed", "sans-serif"],
                nunito: ["Nunito Sans", "sans-serif"],
                monserrat: ["Montserrat", "sans-serif"]
            },
            width: {
                25: "25px",
                30: "30px",
                "40p": "40px",
                "80p": "80px",
                "150p": "150px",
                "200p": "200px",
                boxed: "1140px"
            },
            height: {
                25: "25px",
                30: "30px",
                "36p": "35px",
                40: "40px",
                90: "90px",
                "50p": "50px",
                "70p": "70px",
                "80p": "80px",
                "90p": "90px",
                "100p": "100px",
                "120p": "120px",
                "150p": "150px",
                "200p": "200px",
                "250p": "250px",
                "270p": "270px",
                "300p": "300px",
                "360p": "360px",
                "380p": "380px",
                "400p": "400px",
                "500p": "500px",
                "650p": "650px"
            },
            inset: {
                94: "22rem"
            },
            minHeight: {
                "400p": "400px"
            },
            colors: {
                green: {
                    default: "green",
                    active: "#00d400"
                },
                deepblue: "#1C2334",
                blue: "#273147",
                trueblue: "#007bff",
                softblue: "#7c859a",
                red: "#CB1A2B",
                black: "#1C2334",
                gray: "#F5F5F7",
                graytext: "#80838d",
                graylines: "#f0f0f0",
                grayhard: "#97a6ba",
                graysoft: "#cfd8e3",
                bluetext: "#7c859a40",
                white: "#fff",
                lines: "#2b334a",
                transparent: "transparent",
                primary: "#1ab394",
                success: "#1c84c6",
                info: "#23c6c8",
                warning: "#f8ac59",
                danger: "#ec4758",
                // green: "green",
                blueStart: "#00509a",
                blueEnd: "#003c78"
            },
            maxWidth: {
                boxed: "1140px"
            },
            fontSize: {
                "1x3": "1.3rem",
                "1x5": "1.5rem",
                "2x": "2rem",
                "2x5": "2.5rem",
                "3x": "3rem",
                "3x5": "3.5rem",
                "4x": "4rem",
                "4x5": "4.5rem",
                "5xl": "5rem",
                "6x": "6rem",
                "7xl": "7rem"
            }
        }
    },

    variants: {
        opacity: ["responsive", "hover", "focus", "disabled"]
    },

    plugins: [require("@tailwindcss/ui")]
};
