```mermaid
---
title: As user I can post a comment
---
flowchart TB

LOG[Login page]
PRO(Product page)
TESTLOG{Is user logged ?}
TESTACCOUNT{User has account?}
SIGNIN[Create account]
POS[Post a comment]
WAC[Write a comment]
VPS(Validate comment)
	PRO-->POS
	POS-->TESTLOG
	TESTLOG -- no --> LOG
	LOG --> TESTACCOUNT
	TESTACCOUNT -- yes --> TESTLOG
	TESTACCOUNT -- no --> SIGNIN
	SIGNIN --> TESTLOG
	TESTLOG -- yes --> WAC
	WAC --> VPS
style PRO stroke:green
```

```mermaid
---
title : As an artist i create my page
---
flowchart TB

LOG[Login page]
TESTLOG{Is user logged ?}
TESTACCOUNT{User has account?}
SIGNIN[Create account]
CAP(My space page)
TESTART{it's an artist ?}
ACD(Access denied)
APC(Artist page created)

	CAP-- create page -->TESTLOG
	TESTLOG -- no --> LOG
	TESTLOG -- yes --> TESTART
	LOG --> TESTACCOUNT
	TESTACCOUNT -- yes --> TESTART
	TESTACCOUNT -- no --> SIGNIN
	SIGNIN --> TESTLOG
	TESTART -- yes --> APC
	TESTART -- no --> ACD
style CAP stroke:green
```

```mermaid
---
title : As an admin i create a new product
---
flowchart TB

SI(Site page)
CAP(Post new product)
TESTAD{it's an admin ?}
TESTLOG{Is user logged ?}
LOG[Login page]
ACD(Access denied)
SI --> TESTLOG
TESTLOG -- yes --> TESTAD
TESTLOG -- no --> LOG
LOG --> TESTAD
TESTAD -- 	yes --> CAP
TESTAD -- 	no --> ACD
style SI stroke:green
```
```mermaid
---
title : As an user i can becaume a journalist
---
flowchart TB

CRE(Create journalist account)
USA(user basic account create)
PAJ{Proved as journalist}
SPP{Send Proof journalist}
JAV(Journalist account validated)

CRE  --> PAJ
PAJ -- yes --> JAV
PAJ -- no -->  SPP
SPP -- yes --> JAV
SPP -- no --> USA
style CRE stroke:green
```

```mermaid
---
title : As a new user I can see a suggested product
---
flowchart TB

FV(First visit)
PS{Popup suggestion}
PPP[Page product popup]
CP[Catalogue page]
	FV --> PS
	PS -- Click open --> PPP
	PS -- Click close --> CP
style FV stroke:green

```
```mermaid
---
title : As an user i can add a book to my cart
---
flowchart TB

CP[Catalogue page // product page]
CAT[cart page]
CPU{Cart pop up}

TESTADD{User add product ?}
	
	CP-->TESTADD
	CP --> CP
	TESTADD -- yes --> CPU
	TESTADD -- no --> CP
	CPU -- Access cart --> CAT
	CPU -- Catalogue page --> CP
	CP -- Add to cart --> CPU
style CP stroke:green
```
```mermaid
---
title : As an user i can validatye my cart
---
flowchart TB

LOG[login page]

CAT[cart page]
VAL[Validate cart]
PAY(payment page)
TESTLOG{is user logged ?}
TESTACCOUNT{user has account?}
SIGNIN[create account]
	
	CAT-->TESTLOG
	TESTLOG -- no --> LOG
	LOG --> TESTACCOUNT
	TESTACCOUNT -- yes --> TESTLOG
	TESTACCOUNT -- no --> SIGNIN
	SIGNIN --> TESTLOG
	TESTLOG -- yes --> VAL
	VAL --> PAY
style CAT stroke:green
```
