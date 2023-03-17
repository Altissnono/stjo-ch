
// DlgProxy.cpp : fichier d'implémentation
//

#include "pch.h"
#include "framework.h"
#include "Veto.h"
#include "DlgProxy.h"
#include "VetoDlg.h"

#ifdef _DEBUG
#define new DEBUG_NEW
#endif


// CVetoDlgAutoProxy

IMPLEMENT_DYNCREATE(CVetoDlgAutoProxy, CCmdTarget)

CVetoDlgAutoProxy::CVetoDlgAutoProxy()
{
	EnableAutomation();

	// Pour que l'application continue de s'exécuter tant qu'un objet Automation
	//	est actif, le constructeur appelle AfxOleLockApp.
	AfxOleLockApp();

	// Accéder à la boîte de dialogue par l'intermédiaire du pointeur
	//  de la fenêtre principale de l'application.  Définir le pointeur interne du proxy
	//  pour qu'il pointe vers la boîte de dialogue, et définir le pointeur arrière de la boîte de dialogue pour qu'il pointe vers
	//  ce proxy.
	ASSERT_VALID(AfxGetApp()->m_pMainWnd);
	if (AfxGetApp()->m_pMainWnd)
	{
		ASSERT_KINDOF(CVetoDlg, AfxGetApp()->m_pMainWnd);
		if (AfxGetApp()->m_pMainWnd->IsKindOf(RUNTIME_CLASS(CVetoDlg)))
		{
			m_pDialog = reinterpret_cast<CVetoDlg*>(AfxGetApp()->m_pMainWnd);
			m_pDialog->m_pAutoProxy = this;
		}
	}
}

CVetoDlgAutoProxy::~CVetoDlgAutoProxy()
{
	// Pour mettre fin à l'application lorsque tous les objets ont été créés
	// 	avec Automation, le destructeur appelle AfxOleUnlockApp.
	//  Cela aura notamment pour effet de détruire la boîte de dialogue principale
	if (m_pDialog != nullptr)
		m_pDialog->m_pAutoProxy = nullptr;
	AfxOleUnlockApp();
}

void CVetoDlgAutoProxy::OnFinalRelease()
{
	// Lorsque la dernière référence pour un objet automation est libérée
	// OnFinalRelease est appelé.  La classe de base supprime automatiquement
	// l'objet.  Un nettoyage supplémentaire est requis pour votre
	// objet avant d'appeler la classe de base.

	CCmdTarget::OnFinalRelease();
}

BEGIN_MESSAGE_MAP(CVetoDlgAutoProxy, CCmdTarget)
END_MESSAGE_MAP()

BEGIN_DISPATCH_MAP(CVetoDlgAutoProxy, CCmdTarget)
END_DISPATCH_MAP()

// Remarque : Nous avons ajouté la prise en charge de IID_IVeto pour prendre en charge les liaisons de type sécurisé
//  à partir de VBA.  Cet IID doit correspondre au GUID qui est attaché à
//  dispinterface dans le fichier .IDL.

// {0fcb27e1-411e-4a20-853b-3b37b4c5beb3}
static const IID IID_IVeto =
{0x0fcb27e1,0x411e,0x4a20,{0x85,0x3b,0x3b,0x37,0xb4,0xc5,0xbe,0xb3}};

BEGIN_INTERFACE_MAP(CVetoDlgAutoProxy, CCmdTarget)
	INTERFACE_PART(CVetoDlgAutoProxy, IID_IVeto, Dispatch)
END_INTERFACE_MAP()

// La macro IMPLEMENT_OLECREATE2 est définie dans le fichier pch.h de ce projet
// {66022c41-b9f1-4483-9c9b-777abc557722}
IMPLEMENT_OLECREATE2(CVetoDlgAutoProxy, "Veto.Application", 0x66022c41,0xb9f1,0x4483,0x9c,0x9b,0x77,0x7a,0xbc,0x55,0x77,0x22)


// gestionnaires de messages de CVetoDlgAutoProxy
