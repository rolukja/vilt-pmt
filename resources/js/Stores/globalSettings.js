import { defineStore } from 'pinia';

export const useGlobalSettingsStore = defineStore('globalSettings', {
    state: () => ({
        language: 'en', // Standardsprache
        theme: 'light', // Standard-Farbschema ('light' oder 'dark')
        notificationsEnabled: true, // Benachrichtigungen ein-/ausschalten
    }),
    actions: {

        setLanguage(lang) {
            this.language = lang;
        },

        toggleTheme() {
            this.theme = this.theme === 'light' ? 'dark' : 'light';
        },

        toggleNotifications() {
            this.notificationsEnabled = !this.notificationsEnabled;
        },

    },
    getters: {
        isEnglish: (state) => state.language === 'en',
        isDarkTheme: (state) => state.theme === 'dark',
    },
});
