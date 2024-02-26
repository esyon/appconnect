! function(a) {
    const oxAppConnect = {
        _create: function(event) {
            const self = this,
                elem = self.element,
                options = self.options;

            if (options.trigger === 'click') {
                elem.click(function (event) {
                    self.run(options, self, event);
                })
            } else {
                self.run(options, self, event);
            }
        },
        run(options, self, event) {
            let message = '';
            switch(options.action) {
                case 'sendToken':
                    message = self.createMessage(options.action, {token: options.token, cookies: options.cookies})
                    self.pushMessage(message);
                    break;
                case 'logout':
                    message = self.createMessage(options.action, {})
                    self.pushMessage(message);
                    break;
                case 'scan':
                    message = self.createMessage(options.action, {})
                    self.pushMessage(message);
                    event.preventDefault()
                    break;
                case 'switchLanguage':
                    message = self.createMessage(options.action, {language: options.language})
                    self.pushMessage(message);
                    break;
            }
        },
        createMessage(action, payload){
            return JSON.stringify({action, payload})
        },
        pushMessage: function(message) {
            if(window?.ReactNativeWebView) {
                window.ReactNativeWebView.postMessage(message);
                true;
            }
        }
    };
    a.widget("ui.oxAppConnect", oxAppConnect)
}(jQuery);