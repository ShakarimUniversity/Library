function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },
    isBurgerMenuOpen: false,
    toggleBurgerMenu() {
      console.log('test');
      this.isBurgerMenuOpen = !this.isBurgerMenuOpen;
    },
    isTopMenuOpen: false,
    toggleTopMenu() {
      console.log('test 2');
      this.isTopMenuOpen = !this.isTopMenuOpen;
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false;
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
        this.$nextTick(() => {
            this.isProfileMenuOpen = !this.isProfileMenuOpen;
        });
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen
    },
      isAwardsMenuOpen: false,
      toggleAwardsMenu() {
          this.isAwardsMenuOpen = !this.isAwardsMenuOpen
      },
      isSocialMenuOpen: false,
      toggleSocialMenu() {
          this.isSocialMenuOpen = !this.isSocialMenuOpen
      },
    // Modal
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },
    closeModal() {
      this.isModalOpen = false
      this.trapCleanup()
    },
  }
}
