// CErreurPort.cpp : fichier d'implémentation
//

#include "pch.h"
#include "Veto.h"
#include "CErreurPort.h"
#include "afxdialogex.h"


// boîte de dialogue de CErreurPort

IMPLEMENT_DYNAMIC(CErreurPort, CDialogEx)

CErreurPort::CErreurPort(CWnd* pParent /*=nullptr*/)
	: CDialogEx(IDD_ERREUR_PORT, pParent)
{

}

CErreurPort::~CErreurPort()
{
}

void CErreurPort::DoDataExchange(CDataExchange* pDX)
{
	CDialogEx::DoDataExchange(pDX);
}


BEGIN_MESSAGE_MAP(CErreurPort, CDialogEx)
	ON_BN_CLICKED(ID_FermerErreurPort, &CErreurPort::OnBnClickedFermererreurport)
END_MESSAGE_MAP()


// gestionnaires de messages de CErreurPort


void CErreurPort::OnBnClickedFermererreurport()
{
	CDialogEx::OnOK();
}
