
// Veto.h : fichier d'en-tête principal de l'application PROJECT_NAME
//

#pragma once

#ifndef __AFXWIN_H__
	#error "incluez 'pch.h' avant d'inclure ce fichier pour PCH"
#endif

#include "resource.h"		// symboles principaux


// CVetoApp :
// Consultez Veto.cpp pour l'implémentation de cette classe
//

class CVetoApp : public CWinApp
{
public:
	CVetoApp();

// Substitutions
public:
	virtual BOOL InitInstance();
	virtual int ExitInstance();

// Implémentation

	DECLARE_MESSAGE_MAP()
};

extern CVetoApp theApp;
