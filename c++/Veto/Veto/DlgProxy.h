
// DlgProxy.h : fichier d'en-tête
//

#pragma once

class CVetoDlg;


// cible de commande de CVetoDlgAutoProxy

class CVetoDlgAutoProxy : public CCmdTarget
{
	DECLARE_DYNCREATE(CVetoDlgAutoProxy)

	CVetoDlgAutoProxy();           // constructeur protégé utilisé par la création dynamique

// Attributs
public:
	CVetoDlg* m_pDialog;

// Opérations
public:

// Substitutions
	public:
	virtual void OnFinalRelease();

// Implémentation
protected:
	virtual ~CVetoDlgAutoProxy();

	// Fonctions générées de la table des messages

	DECLARE_MESSAGE_MAP()
	DECLARE_OLECREATE(CVetoDlgAutoProxy)

	// Fonctions générées de la table de dispatch OLE

	DECLARE_DISPATCH_MAP()
	DECLARE_INTERFACE_MAP()
};

