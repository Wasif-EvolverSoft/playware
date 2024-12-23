const activeTab = (tabID) => {


    const tabsList = Array.from((document.getElementById('myTabs').children))
    let tabsButtons = [];

    tabsList.forEach(e => {
        tabsButtons.push(e.children)
    })


    tabsButtons.forEach(e => {

        let tab = Array.from(e)[0]

        if (tab.id == tabID) {
            tab.classList.add('!text-skin-secondary', '!border-blue-700')
            if (tab.id == 'description') {
                tab.classList.remove('!text-skin-primary', '!border-gray-700')
            }
        } else {
            if (tab.id == 'description' && tabID != 'description') {
                tab.classList.add('!text-skin-primary', '!border-gray-700')
            }
            tab.classList.remove('!text-skin-secondary', '!border-blue-700')
        }

    })


}