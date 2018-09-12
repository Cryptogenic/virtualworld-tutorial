# Virtual World Tutorial (CLIENT)

This repo contains the code for the client of the virtual world. It'll contain some basic documentation as well as the source code for the website and the game client (HTML5). Note that the website uses some basic PHP - however PHP is not used for the main login/registration system or anything critical like that. PHP is *only* used to make the site modular - especially in regards to the navbar. This way, when adding a new page, only one file has to be edited (being the header) as opposed to every page file.

### Documentation

Files for specific features and components are listed below:

- [Errors.md](Errors.md) - List of error codes for the client and server (as well as their UI messages)
- [Packets.md](Packets.md) - List of packet types and parameters.
- [Servers.md](Servers.md) - Information on game servers.
- [Items.md](Items.md) - Listing of items and their ID's / other information.
- [Mini-Games.md](Mini-Games.md) - Information on mini-game implementation.
- [Home-Styles.md](Home-Styles.md) - Listing of home styles.
- [Catalogue.md](Catalogue.md) - Listing of catalogue items (furniture) and their ID's / other information.

### Directory Structure

**/**

&nbsp;&nbsp;&nbsp;&nbsp;**/_doc** - Documentation files. Markdown files such as Packets.md and other documentation will be found here.

&nbsp;&nbsp;&nbsp;&nbsp;**/css** - CSS stylesheets.

&nbsp;&nbsp;&nbsp;&nbsp;**/fonts** - Font files.

&nbsp;&nbsp;&nbsp;&nbsp;**/img** - Image files. Game-related files *do not* go here, only site-related.

&nbsp;&nbsp;&nbsp;&nbsp;**/inc** - Included PHP files.

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**/header.php** - Contains the markup for the top portion of page code (including the navbar).

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**/footer.php** - Contains the markup for the bottom portion of page code.

&nbsp;&nbsp;&nbsp;&nbsp;**/game** - Game-related files. Assets, client code, and other game-related materials go here.

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**/js** - Game-related Javascript files.

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**/sprites** - Graphics for client-drawn game objects.

&nbsp;&nbsp;&nbsp;&nbsp;**/js** - General Javascript files. Game-related files *do not* go here.

&nbsp;&nbsp;&nbsp;&nbsp;... Webpage Files

### Requirements

The only requirement for a player to run the client is a modern browser that supports HTML5. The server however must support PHP to host the site, and must be hosting the server code to connect the player's client to other players.

### License

This project is licensed under the MIT license - see the [LICENSE.md](https://github.com/Cryptogenic/JinxOS/blob/master/LICENSE.md) file for details.