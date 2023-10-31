class LocalStorageManager {
    static set(key, value) {
        try {
            localStorage.setItem(key, value);
        } catch (error) {
            console.error('Error saving to localStorage:', error);
        }
    }

    static get(key) {
        try {
            return localStorage.getItem(key);
        } catch (error) {
            console.error('Error retrieving from localStorage:', error);
            return null;
        }
    }

    static remove(key) {
        try {
            localStorage.removeItem(key);
        } catch (error) {
            console.error('Error removing from localStorage:', error);
        }
    }
}
