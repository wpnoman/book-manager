const withMT = require("@material-tailwind/react/utils/withMT");


module.exports = withMT({
  content: [
    "../**.php",
    "../**/**.php",
    "./src/js/**.js",
    "./node_modules/@material-tailwind/react/components/**/*.{js,ts,jsx,tsx}",
    "./node_modules/@material-tailwind/react/theme/components/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [],
});
