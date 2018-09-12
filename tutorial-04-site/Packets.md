# Packet Listing
Packets are used to communicate between the HTML5 client and the Golang server. The official listing for these packets can be found below. For non-login (L) packets - a token is required which is received when logging in. This token not only ensures that the user is authenticated, but it also ensures that players cannot send packets to the server on behalf of other players without their token.

It should be noted that sometimes packets will be received without an initial request. These have specific listeners setup on the client side. It should also be noted that an `E` packet can be sent in replace of the typical response for any request if an error occured while processing the request on the server.

Finally, the original sender's ID in both the client -> server and server -> client case pass the ID in the header - therefore it is not needed in the data parameters (with the exception of the server sending the ID in the login response packet).

### E Packet (Error)
The E packet is sent when a server-sided error occurs. It's sent and the ID is parsed by the client to display the correct error message to the player. E packets are only sent by the server. The data can contain the following parameters:

`i` - Error ID. A list of error ID's can be found in errors.md.

### L Packet (Login/Auth)
The L packet is used for communicating login / authentication actions. The client will send one L packet on a login attempt, and the server will send one back should a successful login occur. Should an error occur when logging in, an `E` packet will be sent instead. The data can contain the following parameters:

**Client -> Server**

`n` - Username. Required.

`p` - Password hashed with sha256. Required.

`s` - Server ID. More information on servers can be found in server.md. Required.

**Server -> Client**

`u` - User ID. 

`t` - Login token. This needs to be sent with non-login related packets. Only valid for that session.

### A Packet (Action)
The A packet is sent when a player action occurs, such as movement, waving, dancing, or other various actions. The data can contain the following parameters:

**Client -> Server**

`i` - Action ID. Below is a list of action ID's. Required.

`p` - New position in `x,y` format. Only used when the action ID `i` is set to the `movement` ID. Optional.

`t` - Token received at authentication. Required.

List of actions:

```
move
wave
```

**Server -> Client**

`i` - Action ID. A list can be found in section 2A.

`p` - New position in `x,y` format. Only used when the action ID `i` is set to the `movement` ID.

### I Packet (Items)
The I packet is used for managing player items. The data can contain the following parameters:

**Client -> Server**

`i` - Item ID. Item descriptions can be found in items.md. Required.

`a` - Action. Possible actions include buy/add, delete, and use. List of action ID's is below. Required.

`t` - Token received at authentication. Required.

List of actions:

```
buy
add
delete
use
```

**Server -> Client**

The server response will send back a packet containing the item ID if the request checked out, however if it failed, an `E` packet will be sent instead.

`i` - Item ID. Item descriptions can be found in items.md

`r` = 1

### M Packet (Messages)
The M packet is used for messaging. The data can contain the following parameters:

**Client -> Server**

`t` - Text. Optional.

`e` - Emote. If set, the `t` property is ignored. Optional.

`t` - Token received at authentication. Required.

**Server -> Client**

`t` - Text.

`e` - Emote. If set, the `t` property is ignored.

### F Packet (Friends)
The F packet is used for managing the player's friend list. The data can contain the following parameters:

**Client -> Server**

`a` - Action. Possible actions include sending a friend request, accepting a friend request, listing friends, and getting a friend count. List of action ID's is below. Required.

`f` - Friend ID. Optional.

`t` - Token received at authentication. Required.

List of actions:
```
sendreq
acceptreq
list
friendcount
```

**Server -> Client**
The packet sent back depends on the requested action. Sometimes packets will be received without an initial request, specifically when a friend request is *received*. The possible response types are below:

*Sending a friend request*
If failed, an `E` packet will be sent, if succeeded, the packet will contain the following parameter:

`r` = 1

*Receiving a friend request*

`f` - Potential friend ID.

*Listing friends*

`fs` - List of friend ID's, seperated by a comma.

*Friend count*

`c` - Total amount of friends.

### MG packet (Mini-Games)
Each mini-game will have it's own sub-packet type. To see each mini-game's request and response packet structure, see mini-games.md.

### H packet (Home)
The H packet is used for player home management. Note that upon player login, the server sends a massive home packet (called "load") to the client so the client can cache it to load the room.

**Note:** The load packet will be sent to other players who connect to a player's room. It's sent from the server to ensure it's not tampered by a potentially modified client ran by the host.

The data can contain the following parameters:

**Client -> Server**

`a` - Action. Actions include requesting the home load packet, adding a furniture item to the home, storing a furniture item back to menu, inviting other players to the home, and accepting an invitation to a player's home. List of actions is below. Required.

`i` - ID of the home. Unless the action is accepting an invitation to another player's home - this will always be equal to the player's ID. Required.

`f` - Furniture item to add or store. Only used when those actions are specified (`addfurn`/`storefurn`). Optional.

`s` - Set style. Only used when the `changestyle` action is used. Optional.

`p` - Player ID. Only used when inviting another player into the home via `invite`. Optional.

`l`- Privacy setting. Only used when the `setprivacy` action is used. Optional.

`t` - Token received at authentication. Required.

List of actions:

```
load
addfurn
storefurn
changestyle
setprivacy
invite
accept
```

**Server -> Client**
The packet sent back depends on the requested action. The possible responses are below:

*Load Packet*

`s` - Home style ID. For more information, see home-styles.md.

`fl` - Furniture list. Each furniture item follows the format below, seperated by a comma: `[Furniture Item ID]:x,y`.

`l` - Privacy setting. If set to "open", it can be joined by anyone via the map. If set to "invite", only invited players can join. If set to "closed", nobody can join the home.

*Successful Packet*

If the request (such as adding or storing an item) is successful, the following data parameters will be received:

`r` = 1

### C Packet (Catalogue)
The C packet is used for catalogues, which players can use to buy furniture. Regular items should be purchased/obtained using the `i` packet. The catalogue is only used for home management. The data can contain the following parameters:

**Client -> Server**

`a` - Action. Actions include buying an item and selling an item. List of actions is below. Required.

`i` - ID of the furniture item being bought or sold. Required.

`t` - Token received at authentication. Required.

List of actions:

```
buy
sell
```

**Server -> Client**
If failed, an `E` packet will be sent, if succeeded, the packet will contain the following parameter:

`r` = 1

### P Packet (Ping)
The P packet is used for pinging, and is sent and received every 5 seconds between the client and server. The data will contain the following:

**Client -> Server**

`ping`

**Server -> Client**

`pong`