// CErreur.cpp : fichier d'implémentation
//

#include "pch.h"
#include "Veto.h"
#include "CErreur.h"
#include "afxdialogex.h"
#include "VetoDlg.h"



// boîte de dialogue de CErreur

IMPLEMENT_DYNAMIC(CErreur, CDialogEx)

CErreur::CErreur(CWnd* pParent /*=nullptr*/)
	: CDialogEx(IDD_ERREUR, pParent)
{

}

CErreur::~CErreur()
{
}

void CErreur::DoDataExchange(CDataExchange* pDX)
{
	CDialogEx::DoDataExchange(pDX);
	DDX_Control(pDX, IDC_STATIC_ErreurModif, m_ErreurModif);
}


BEGIN_MESSAGE_MAP(CErreur, CDialogEx)
	ON_BN_CLICKED(ID_Relance, &CErreur::OnBnClickedRelance)
END_MESSAGE_MAP()


// gestionnaires de messages de CErreur


void CErreur::OnBnClickedRelance()
{
	
	CDialogEx::OnOK();
}








