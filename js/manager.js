'use strict';


module.exports = function (oAppData) {
	var
		App = require('%PathToCoreWebclientModule%/js/App.js'),
		Settings = require('modules/%ModuleName%/js/Settings.js'),
		bAnonimUser = App.getUserRole() === Enums.UserRole.Anonymous,
		SignupView = null
	;

	Settings.init(oAppData);

	if (!App.isPublic() && bAnonimUser)
	{
		if (App.isMobile())
		{
			return {
				/**
				 * Returns signup view screen as is.
				 */
				getSignupScreenView: function () {
					return require('modules/%ModuleName%/js/views/MainView.js');
				},

				getHashModuleName: function () {
					return Settings.HashModuleName;
				}
			};
		}
		else
		{
			var GetSignupView = function() {
				if (SignupView === null)
				{
					SignupView = require('modules/%ModuleName%/js/views/MainView.js');
				}
				return SignupView;
			};

			return {
				/**
				 * Returns signup view screen.
				 */
				getScreens: function () {
					var oScreens = {};
					oScreens[Settings.HashModuleName] = function () {
						return require('modules/%ModuleName%/js/views/MainView.js');
					};
					return oScreens;
				},

				registerExtentionComponent: function (oComponent) {
					var SignupView = GetSignupView();
					SignupView.registerExtentionComponent(oComponent);
				}
			};
		}
	}

	return null;
};
