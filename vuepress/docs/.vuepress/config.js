import { defaultTheme } from 'vuepress';
import { removeHtmlExtensionPlugin } from 'vuepress-plugin-remove-html-extension';
import { navbar } from './navbar';
import { sidebar } from './sidebar';

module.exports = {
    lang: "zh-TW",
    title: "Taras's TechBlog",
    description: "Taras's TechBlog mage with Laravel and VuePress",
    themeConfig: {
        logo: "https://vuejs.org/images/logo.png",
    },
    base: "/",
    dest: "../public/vuepress",
    plugins: [
        removeHtmlExtensionPlugin(),
    ],
    theme: defaultTheme({
        navbar,
        sidebar,
    }),
};
